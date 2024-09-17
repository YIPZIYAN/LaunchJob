<?php

namespace App\Livewire;

use App\Models\JobPost;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class UnarchiveJob extends Component
{
    public $jobPost;

    public function submit()
    {
        $jobPost = JobPost::withTrashed()->findOrFail($this->jobPost->id);

        if ($jobPost->restore()) {
            toastr()->success("Job Post Unarchived Successfully");
        } else {
            toastr()->error("Failed to unarchive the job post");
        }

        return redirect(route('management.job-post.archived', absolute: false));
    }

    public function render()
    {
        return view('livewire.unarchive-job');
    }
}
