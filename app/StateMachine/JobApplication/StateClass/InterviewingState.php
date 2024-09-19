<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class InterviewingState extends BaseJobApplicationState
{
    public function offer()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::OFFERING])
            ? ['success' => 'Offer letter sent successfully.']
            : ['error' => 'Failed to send offer letter.'];
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
