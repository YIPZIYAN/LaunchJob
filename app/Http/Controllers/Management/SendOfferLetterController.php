<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class SendOfferLetterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(JobApplication $jobApplication)
    {
        return view('management.send-offer-letter',compact('jobApplication'));
    }
}
