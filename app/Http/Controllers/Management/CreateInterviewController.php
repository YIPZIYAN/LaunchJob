<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CreateInterviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(JobApplication $jobApplication)
    {
        return view('management.interview.create',['jobApplication'=>$jobApplication]);
    }
}
