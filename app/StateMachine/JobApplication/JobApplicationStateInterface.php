<?php

namespace App\StateMachine\JobApplication;

interface JobApplicationStateInterface
{
    function shortlist();

    function scheduleInterview();

    function reject();

    function offer();

    function acceptOffer();

    function rejectOffer();
}
