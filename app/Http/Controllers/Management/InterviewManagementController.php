<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.interview.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        return view('management.interview.edit', compact('interview'));
    }

}
