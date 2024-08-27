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
        $validatedData = $request->validated();
        $validatedData['company_id'] = auth()->user()->company_id;
        $jobPost = JobPost::create($validatedData);

        if ($jobPost) {
            //toastr()->success("Job Created Successfully");
        } else {
            //toastr()->error("Failed to create new job post");
        }

        return Redirect::route('dashboard');

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
        $validatedData = $request->validated();
        $jobPost->update($validatedData);

        if ($jobPost->wasChanged()) {
//            toastr()->success("Job Details Updated Successfully");
        } else {
//            toastr()->info("No changes were made to the job");
        }
        return Redirect::route('dashboard');

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
