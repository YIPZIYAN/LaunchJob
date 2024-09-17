<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteJob extends Component
{
    public $jobPost;

    public function submit()
    {

        if ($this->jobPost->delete()) {
            toastr()->success("Job Post Archived Successfully");
        } else {
            toastr()->error("Failed to archive the job");
        }

        return redirect(route('dashboard', absolute: false));

    }

    public function render()
    {
        return view('livewire.delete-job');
    }

}
