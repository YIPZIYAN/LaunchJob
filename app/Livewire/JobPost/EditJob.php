<?php

namespace App\Livewire\JobPost;

use App\Models\JobType;
use Livewire\Component;

class EditJob extends Component
{
    public $jobPost;
    public $name;
    public $description;
    public $location;
    public $min_salary;
    public $max_salary;
    public $period;
    public $mode;
    public $job_type_id;

    public $period_list = [
        'Full-time',
        'Part-time',
        'Contract',
        'Internship',
        'Freelance',
    ];

    public $mode_list = [
        'On-site',
        'Remote',
        'Hybrid'
    ];

    public $type_list;

    public function mount()
    {

        $this->type_list = JobType::select('id','name')
            ->get()
            ->map(function ($jobType) {
                return [
                    'value' => $jobType->id,
                    'label' => $jobType->name,
                ];
            })
            ->toArray();
        $this->fill($this->jobPost->toArray());
    }

    protected function rules() {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'min_salary' => 'required|integer|min:1|max:300000',
            'max_salary' => 'required|integer|min:1|max:300000|gte:min_salary',
            'period' => 'required|string',
            'mode' => 'required|string',
            'job_type_id' => 'required|exists:job_types,id',
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->jobPost->update($validatedData);

        $message = $this->jobPost->wasChanged()
            ? ['success' => 'Job details updated successfully.']
            : ['info' => 'No changes were made to the job.'];

        return redirect()->route('dashboard')->with($message);

    }

    public function render()
    {
        return view('livewire.job-post.edit-job');
    }
}
