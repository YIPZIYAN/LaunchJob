<?php

namespace App\StateMachine\JobApplication;

use App\Models\Interview;
use App\Models\JobApplication;
use Exception;

class BaseJobApplicationState implements JobApplicationStateInterface
{

    public function __construct(public JobApplication $jobApplication)
    {
    }

    public function shortlist()
    {
        throw new Exception();
    }

    public function scheduleInterview(Interview $interview)
    {
        throw new Exception();
    }

    public function reject()
    {
        throw new Exception();
    }

    public function offer()
    {
        throw new Exception();
    }

    public function acceptOffer()
    {
        throw new Exception();
    }

    public function rejectOffer()
    {
        throw new Exception();
    }
}
