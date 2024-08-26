<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('job-post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job-post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        return view('job-post.show',[
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        return view('job-post.edit',[
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPostRequest $request, JobPost $jobPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        return view('job-post.index');
    }
}
