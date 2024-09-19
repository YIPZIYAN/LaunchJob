<?php

namespace App\Livewire\JobState;

use App\Models\JobApplication;
use App\StateMachine\JobApplication\JobApplicationState;
use App\StateMachine\JobApplication\JobApplicationStateInterface;
use Livewire\Component;

class EmployeeSelectButton extends Component implements JobApplicationStateInterface
{
    public JobApplication $jobApplication;
    public JobApplicationState $applicationState;
    public function mount()
    {
        $this->applicationState = JobApplicationState::tryFrom($this->jobApplication->status);
    }

    public function render()
    {
        return view('livewire.job-state.employee-select-button');
    }

    function shortlist()
    {
        // TODO: Implement shortlist() method.
    }

    function scheduleInterview()
    {
        // TODO: Implement scheduleInterview() method.
    }

    function reject()
    {
        // TODO: Implement reject() method.
    }

    function offer()
    {
        // TODO: Implement offer() method.
    }

    function acceptOffer()
    {
        $this->jobApplication->state()->acceptOffer();
    }

    function rejectOffer()
    {
        $this->jobApplication->state()->rejectOffer();
    }
}
