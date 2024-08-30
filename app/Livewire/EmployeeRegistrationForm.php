<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class EmployeeRegistrationForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $user = User::create($validatedData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    public function render()
    {
        return view('livewire.employee-registration-form');
    }
}
