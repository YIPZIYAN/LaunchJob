<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillTestController extends Controller
{
    public function index(string $id)
    {
        return view('webservice.skills', ['id' => $id]);
    }
}
