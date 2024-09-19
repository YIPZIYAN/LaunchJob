<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\Models\Interview;
use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class ShortlistedState extends BaseJobApplicationState
{
    public function scheduleInterview(Interview $interview)
    {
        $this->jobApplication->interviews->create($interview);
        $this->jobApplication->update(['state' => JobApplicationState::INTERVIEWING]);
    }
}
