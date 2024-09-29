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
        if (auth()->user()->company_id !== $jobApplication->jobPost->company_id) {
            abort(403);
        }
        return view('management.interview.create',['jobApplication'=>$jobApplication]);
    }
}
