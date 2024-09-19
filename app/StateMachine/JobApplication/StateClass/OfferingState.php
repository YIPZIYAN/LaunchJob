<?php

namespace App\StateMachine\JobApplication\StateClass;

use App\StateMachine\JobApplication\BaseJobApplicationState;
use App\StateMachine\JobApplication\JobApplicationState;

class OfferingState extends BaseJobApplicationState
{
    public function acceptOffer()
    {
        $this->jobApplication->update(['state' => JobApplicationState::OFFER_ACCEPTED]);

    }

    public function rejectOffer()
    {
        $this->jobApplication->update(['state' => JobApplicationState::OFFER_REJECTED]);
    }
}
