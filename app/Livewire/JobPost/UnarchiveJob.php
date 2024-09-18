<?php

namespace App\Livewire\JobPost;

use App\Models\JobPost;
use Livewire\Component;

class UnarchiveJob extends Component
{
    public $jobPost;

    public function submit()
    {
        $jobPost = JobPost::withTrashed()->findOrFail($this->jobPost->id);

        $message = $jobPost->restore()
            ? ['success' => 'Job post unarchived successfully.']
            : ['error' => 'Failed to unarchive the job.'];

        return redirect()->route('management.job-post.archived')->with($message);

    }

    public function render()
    {
        return view('livewire.job-post.unarchive-job');
    }
}
