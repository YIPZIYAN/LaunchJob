<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class NewState extends BaseJobApplicationState
{
    public function shortlist()
    {
        $this->jobApplication->update(['state' => JobApplicationState::SHORTLISTED]);
    }

    public function reject()
    {
        $this->jobApplication->update(['state' => JobApplicationState::REJECTED]);
    }
}
