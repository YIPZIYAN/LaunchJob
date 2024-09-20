<?php

namespace App\StateMachine\JobApplication;

enum JobApplicationState: string
{
    case NEW = "new";
    case SHORTLISTED = "shortlisted";
    case INTERVIEWING = "interviewing";
    case REJECTED = "rejected";
    case OFFERING = "offering";
    case OFFER_ACCEPTED = "offer accepted";
    case OFFER_REJECTED = "offer rejected";

    public function label(): string
    {
        return match ($this) {
            JobApplicationState::NEW => 'New',
            JobApplicationState::SHORTLISTED => 'Shortlisted',
            JobApplicationState::INTERVIEWING => 'Interviewing',
            JobApplicationState::REJECTED => 'Rejected',
            JobApplicationState::OFFERING => 'Offering',
            JobApplicationState::OFFER_ACCEPTED => 'Offer Accepted',
            JobApplicationState::OFFER_REJECTED => 'Offer Rejected',
        };
    }
}
