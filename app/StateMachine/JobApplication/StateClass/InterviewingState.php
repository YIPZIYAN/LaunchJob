<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class InterviewingState extends BaseJobApplicationState
{
    public function offer()
    {
        $this->jobApplication->update(['state' => JobApplicationState::OFFERING]);
    }

    public function reject()
    {
        $this->jobApplication->update(['state' => JobApplicationState::REJECTED]);
    }
}
