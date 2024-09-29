<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Models\JobPost;
use App\StateMachine\JobApplication\JobApplicationState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use WireUi\Traits\WireUiActions;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('job-application.index', [
            'jobApplications' => JobApplication::with('jobPost.company')
                ->where('user_id', Auth::id())
                ->get()
                ->sortByDesc('updated_at')
                ->values()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobApplicationRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {
        Gate::authorize('view', $jobApplication);
        return view('job-application.show', [
            'jobApplication' => $jobApplication->load([
                'jobPost.company',
                'interviews' => function ($query) {
                    $query->orderBy('date');
                }])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
