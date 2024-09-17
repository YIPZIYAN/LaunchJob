<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Locked;
use Livewire\Component;

class CompanyRegistrationForm extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $description;

    public $company;
    public $is_new = false;

    public function mount()
    {
    }

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
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        dd($this->is_new);

//        $validatedData = $this->validate();
//
//        $user = User::create($validatedData);
//
//        $user->assignRole('company');
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(route('home', absolute: false));
    }
}
