<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){
        return view('webservice.events');
    }
}
