<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\Mail\OfferLetterSent;
use App\Models\User;
use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;
use Illuminate\Support\Facades\Mail;

class InterviewingState extends BaseJobApplicationState
{
    public function offer()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::OFFERING])
            ? ['success' => 'Offer letter sent successfully.']
            : ['error' => 'Failed to send offer letter.'];
        Mail::to(User::findOrFail($this->jobApplication->user_id))
            ->send(new OfferLetterSent($this->jobApplication));
        return redirect(route('management.job-post.show',$this->jobApplication->jobPost))->with($message);
    }

    public function scheduleInterview()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::INTERVIEWING])
            ? ['success' => 'Schedule interview successfully.']
            : ['error' => 'Failed to schedule an interview.'];
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
