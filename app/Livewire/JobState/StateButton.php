<?php

namespace App\Livewire\JobState;

use App\Models\Interview;
use App\Models\JobApplication;
use App\StateMachine\JobApplication\JobApplicationState;
use App\StateMachine\JobApplication\JobApplicationStateInterface;
use Livewire\Component;

class StateButton extends Component
{
    public JobApplication $jobApplication;
    public JobApplicationState $applicationState;
    public function mount()
    {
        $this->applicationState = JobApplicationState::tryFrom($this->jobApplication->status);
    }

    public function render()
    {
        return view('livewire.job-state.state-button');
    }


    function shortlist()
    {
        $this->jobApplication->state()->shortlist();
    }

    function scheduleInterview(Interview $interview)
    {
        // TODO: Implement scheduleInterview() method.
    }

    function reject()
    {
        $this->jobApplication->state()->reject();
    }

    function offer()
    {
        $this->jobApplication->state()->offer();
    }

    function acceptOffer()
    {
        // TODO: Implement acceptOffer() method.
    }

    function rejectOffer()
    {
        // TODO: Implement rejectOffer() method.
    }
}
