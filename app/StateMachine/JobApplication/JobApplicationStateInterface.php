<?php

namespace App\StateMachine\JobApplication;

use App\Models\Interview;

interface JobApplicationStateInterface
{
    function shortlist();

    function scheduleInterview();

    function reject();

    function offer();

    function acceptOffer();

    function rejectOffer();
}
