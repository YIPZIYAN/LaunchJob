<?php

namespace App\Livewire\Profile;

use App\Models\Employee;
use App\Models\InterestJobType;
use App\Models\JobType;
use Livewire\Component;

class InterestJobTypeForm extends Component
{
    public $job_type_id = [];
    public $employee;
    public $type_list;

    public function mount()
    {
        $this->employee = Employee::where('user_id', auth()->user()->id)->firstOrFail();

        $this->job_type_id = $this->employee->jobType()->pluck('job_type_id')->toArray();

        $this->type_list = JobType::select('id', 'name')
            ->get()
            ->map(function ($jobType) {
                return [
                    'value' => $jobType->id,
                    'label' => $jobType->name,
                ];
            })
            ->toArray();
    }

    protected function rules()
    {
        return [
            'job_type_id' => 'array|exists:job_types,id|max:3',
        ];
    }

    public function submit()
    {
        $this->validate();
        $message = $this->employee->jobType()->sync($this->job_type_id)
            ? ['success' => 'Interest job type save successfully.']
            : ['info' => 'Failed to save interest job type.'];

        return redirect()->route('profile.edit')->with($message);

    }

    public function render()
    {
        return view('livewire.profile.interest-job-type-form');
    }
}
