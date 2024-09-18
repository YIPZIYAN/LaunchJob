<?php

namespace App\Livewire\JobState;

use App\Models\JobPost;
use App\StateMachine\JobApplication\JobApplicationState;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class ApplyButton extends Component
{
    use WireUiActions;

    public JobPost $jobPost;
    public $isApplied = false;

    public function mount()
    {
        $this->isApplied =  Auth::user()->jobPosts->contains($this->jobPost);
    }

    public function render()
    {
        return view('livewire.job-state.apply-button');
    }

    public function apply()
    {
        Auth::user()->jobPosts()->attach($this->jobPost->id, ['status' => JobApplicationState::NEW]);

        return redirect()->route('job-application.index')->with([
            'success' => 'Job Application Successfully Created'
        ]);


    }
}
