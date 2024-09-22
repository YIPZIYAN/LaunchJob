<?php

namespace App\Livewire\Profile;

use App\Factory\ProfileFactory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeProfileForm extends Component
{

    use WithFileUploads;

    public $profileData = [];
    #[Validate('nullable|mimes:pdf')] // 1MB Max
    public $resume;
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


    public function mount()
    {
        $profile = ProfileFactory::create(auth()->user());
        $this->profileData = $profile->getProfileDetails();
    }

    protected function rules()
    {
        return [
            'profileData.profession' => ['required', 'string', 'in:' . implode(',', $this->profession_list)],
            'profileData.about' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $employee = auth()->user()->employee;

        if ($this->resume) {
            if ($employee->resume) {
                Storage::disk('public')->delete($employee->resume);
            }

            $filename = 'resume_' . auth()->user()->name . '.' . $this->resume->getClientOriginalExtension();

            $validatedData['profileData']['resume'] = $this->resume->storeAs('resumes', $filename, 'public');;
        } else {
            $validatedData['profileData']['resume'] = $employee->resume;
        }

        $profile = ProfileFactory::create(auth()->user());
        $profile->saveProfileDetails($validatedData['profileData']);

        $message = $employee->wasChanged()
            ? ['success' => 'Employee information updated successfully.']
            : ['info' => 'No changes were made to the employee information.'];

        return redirect()->route('profile.edit')->with($message);
    }

    public function render()
    {
        return view('livewire.profile.employee-profile-form');
    }
}
