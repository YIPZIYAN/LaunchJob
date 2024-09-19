<?php

namespace App\Livewire\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class CompanyRegistrationForm extends Component
{

    //Personal Info
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    //Selected Company
    private $company;

    public $company_id;

    //New company details
    public $company_name;
    public $address;
    public $description;

    public $is_new = false;

    public function render()
    {
        return view('livewire.auth.company-registration-form');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],

            'company_id' => [Rule::requiredIf(!$this->is_new), 'nullable', 'exists:App\Models\Company,id', 'max:255'],

            'company_name' => [Rule::requiredIf($this->is_new), 'nullable', 'string', 'max:255'],
            'address' => [Rule::requiredIf($this->is_new), 'nullable', 'string', 'max:255'],
            'description' => [Rule::requiredIf($this->is_new),'nullable', 'max:255'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if ($this->is_new) {
            $this->company = Company::create([
                'name' => $this->company_name,
                'address' => $this->address,
                'description' => $this->description,
            ]);
        } else {
            $this->company = Company::findOrFail($this->company_id);
        }

        $user = $this->company->users()->create($validatedData);
        $user->assignRole('company');
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
