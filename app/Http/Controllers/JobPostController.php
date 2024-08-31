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
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        if ($jobPost->delete()) {
            toastr()->success("Job Post Archived Successfully");
        } else {
            toastr()->error("Failed to archive the job");
        }

        return Redirect::route('dashboard');
    }

    public function restore($id)
    {

        $jobPost = JobPost::withTrashed()->findOrFail($id);

        if ($jobPost->restore()) {
            toastr()->success("Job Post Unarchived Successfully");
        } else {
            toastr()->error("Failed to unarchive the job post");
        }

        return Redirect::route('job-post.archived');

    }

    /**
     * Archived Job List
     */
    public function archived()
    {
        return view('job-post.archived',[
            'jobPosts' => JobPost::onlyTrashed()->get()
        ]);
    }
}
