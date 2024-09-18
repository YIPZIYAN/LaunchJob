<?php

namespace App\Livewire\JobState;

use App\Models\JobPost;
use App\StateMachine\JobApplication\JobApplicationState;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class ApplyButton extends Component
{
    use WireUiActions;

    public JobPost $jobPost;
    public $isApplied = false;

    public function mount(): void
    {
        $this->isApplied = Auth::user()->jobPosts->contains($this->jobPost);
    }

    public function render(): View
    {
        return view('livewire.job-state.apply-button');
    }

    public function apply()
    {
        Auth::user()->jobPosts()->attach($this->jobPost->id, ['status' => JobApplicationState::NEW]);

        return redirect()->route('job-application.index')->with([
            'success' => 'Successfully applied ' . $this->jobPost->name,
        ]);

    }
}
