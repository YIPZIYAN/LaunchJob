<?php

namespace App\Livewire\JobPost;

use Livewire\Component;

class ArchiveJob extends Component
{
    public $jobPost;

    public function submit()
    {
        $message = $this->jobPost->delete()
            ? ['success' => 'Job post archived successfully.']
            : ['error' => 'Failed to archive the job.'];

        return redirect()->route('dashboard')->with($message);
    }

    public function render()
    {
        return view('livewire.job-post.archive-job');
    }

}
