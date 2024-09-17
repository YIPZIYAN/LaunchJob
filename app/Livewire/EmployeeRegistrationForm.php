<?php

namespace App\Livewire;

use App\Models\Employee;
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
    public $about;
    public $profession;
    public $profession_list = [
        'Software Developer',
        'Data Scientist',
        'Product Manager',
        'UX/UI Designer',
        'Marketing Specialist',
        'Sales Representative',
        'Customer Support Specialist',
        'Project Manager',
        'Human Resources Manager',
        'Financial Analyst',
        'Graphic Designer',
        'Accountant',
        'Operations Manager',
        'Legal Advisor',
        'Content Writer',
        'Digital Marketing Manager',
        'Mechanical Engineer',
        'Civil Engineer',
        'Business Analyst',
        'Healthcare Professional',
        'Teacher/Educator',
        'Network Engineer',
        'IT Support Specialist',
        'Supply Chain Manager',
        'Consultant'
    ];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'profession' => ['required', 'string', 'in:' . implode(',', $this->profession_list)],
            'about' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $user = User::create($validatedData);

        $user->employee()->create($validatedData);
        $user->assignRole('employee');
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    public function render()
    {
        return view('livewire.employee-registration-form');
    }
}
