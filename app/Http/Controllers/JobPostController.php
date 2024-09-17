<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;
use Illuminate\Support\Facades\Redirect;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.job-post.index');
    }

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
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        return view('management.job-post.edit', [
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
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
}
