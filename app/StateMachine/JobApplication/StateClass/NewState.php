<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class NewState extends BaseJobApplicationState
{
    public function shortlist()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::SHORTLISTED])
            ? ['success' => 'Shortlist applicant successfully.']
            : ['error' => 'Failed to shortlist this applicant.'];
        return redirect(route('management.job-post.show',$this->jobApplication->jobPost))->with($message);
    }

    public function reject()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::REJECTED])
            ? ['success' => 'Reject applicant successfully.']
            : ['error' => 'Failed to reject this applicant.'];
        return redirect(route('management.job-post.show',$this->jobApplication->jobPost))->with($message);
    }
}
