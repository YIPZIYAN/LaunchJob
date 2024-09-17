<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\JobPost;
use App\Models\User;
use Livewire\Component;
use PHPUnit\Util\PHP\Job;

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

        if ($company->jobPosts()->create($validatedData)) {
            toastr()->success("Job Created Successfully");
        } else {
            toastr()->error("Failed to create new job post");
        }

        return redirect(route('dashboard', absolute: false));
    }

    public function render()
    {
        return view('livewire.create-job');
    }
}
