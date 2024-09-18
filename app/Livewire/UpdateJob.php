<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateJob extends Component
{
    public $jobPost;
    public $name;
    public $description;
    public $location;
    public $min_salary;
    public $max_salary;
    public $period;
    public $type;
    public $mode;

    public function mount()
    {
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
            'type' => 'required|string',
            'mode' => 'required|string'
        ];
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->jobPost->update($validatedData);

        if ($this->jobPost->wasChanged()) {
            toastr()->success("Job Details Updated Successfully");
        } else {
            toastr()->info("No changes were made to the job");
        }

        return redirect(route('dashboard', absolute: false));
    }

    public function render()
    {
        return view('livewire.update-job');
    }
}
