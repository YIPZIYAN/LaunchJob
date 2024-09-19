<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Models\JobApplication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobApplication = JobApplication::where('user_id', Auth::id())->pluck('id');
        $groupedInterviews = Interview::with('jobApplication.jobPost.company')
            ->whereIn('job_application_id', $jobApplication)
            ->whereDay('date', '>=', now())
            ->orderBy('date')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->date)->format('Y-m-d');
            });

        $groupedInterviewsHistory = Interview::with('jobApplication.jobPost.company')
            ->whereIn('job_application_id', $jobApplication)
            ->whereDay('date', '<', now())
            ->orderByDesc('date')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->date)->format('Y-m-d');
            });


        return view('interview.index', [
            'groupedInterviews' => $groupedInterviews,
            'groupedInterviewsHistory' => $groupedInterviewsHistory,
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
    public function store(StoreInterviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterviewRequest $request, Interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interview $interview)
    {
        //
    }
}
