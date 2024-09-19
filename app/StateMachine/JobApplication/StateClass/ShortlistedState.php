<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\Models\Interview;
use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class ShortlistedState extends BaseJobApplicationState
{
    public function scheduleInterview()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::INTERVIEWING])
            ? ['success' => 'Schedule interview successfully.']
            : ['error' => 'Failed to schedule an interview.'];
        return redirect(route('management.job-post.show',$this->jobApplication->jobPost))->with($message);
    }
}
