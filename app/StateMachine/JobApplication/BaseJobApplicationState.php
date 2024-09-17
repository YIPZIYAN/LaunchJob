<?php

namespace App\StateMachine\JobApplication;

use App\Models\JobApplication;
use Exception;

class BaseJobApplicationState implements JobApplicationStateInterface
{

    public function __construct(public JobApplication $jobApplication)
    {
    }

    public function apply()
    {
        throw new Exception();
    }

    public function shortlist()
    {
        throw new Exception();
    }

    public function scheduleInterview()
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
