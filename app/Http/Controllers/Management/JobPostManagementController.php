<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class JobPostManagementController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.job-post.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        return view('management.job-post.show', [
            'jobPost' => $jobPost->load(['users']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jobPost)
    {
        return view('management.job-post.edit', [
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Archived Job List
     */
    public function archived()
    {
        return view('management.job-post.archived', [
            'jobPosts' => JobPost::onlyTrashed()->get()
        ]);
    }

    public function showApplicant(JobPost $jobPost, User $user)
    {
        $jobApplication = JobApplication::where('job_post_id', $jobPost->id)->where('user_id', $user->id)->first();
        return view('management.job-application.show', [
            'jobApplication' => $jobApplication->load([
                'user.employee',
                'interviews' => function ($query) {
                    $query->orderBy('date');
                }])
        ]);
    }
}
