<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InterviewManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.interview.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        Gate::authorize('view', $interview);
        return view('management.interview.edit', compact('interview'));
    }

}
