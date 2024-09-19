<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class OfferingState extends BaseJobApplicationState
{
    public function acceptOffer()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::OFFER_ACCEPTED])
            ? ['success' => 'Offer accepted successfully.']
            : ['error' => 'Failed to accept this offer.'];
        return redirect(route('job-application.show', $this->jobApplication))->with($message);

    }

    public function rejectOffer()
    {
        $message = $this->jobApplication->update(['status' => JobApplicationState::OFFER_REJECTED])
            ? ['success' => 'Offer rejected successfully.']
            : ['error' => 'Failed to reject this offer.'];
        return redirect(route('job-application.show', $this->jobApplication))->with($message);
    }
}
