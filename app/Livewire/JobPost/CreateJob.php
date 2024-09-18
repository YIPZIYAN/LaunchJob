<?php

namespace App\Livewire\JobPost;

use App\Models\Company;
use Livewire\Component;

class CreateJob extends Component
{
    public $name;
    public $description;
    public $location;
    public $min_salary;
    public $max_salary;
    public $period;
    public $type;
    public $mode;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'min_salary' => 'required|integer|min:1|max:300000',
            'max_salary' => 'required|integer|min:1|max:300000|gte:min_salary',
            'period' => 'required|string',
            'type' => 'required|string',
            'mode' => 'required|string'
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $company = Company::find(auth()->user()->company_id);

        $message = $company->jobPosts()->create($validatedData)
            ? ['success' => 'Job created successfully.']
            : ['error' => 'Failed to create new job post.'];

        return redirect()->route('dashboard')->with($message);

    }

    public function render()
    {
        return view('livewire.job-post.create-job');
    }
}
