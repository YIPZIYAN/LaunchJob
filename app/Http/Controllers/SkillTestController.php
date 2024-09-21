<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillTestController extends Controller
{
    public function index(){
        return view('webservice.skills');
    }
}
