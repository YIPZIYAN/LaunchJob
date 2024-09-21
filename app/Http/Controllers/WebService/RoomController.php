<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('webservice.room.index');
    }

    public function show(string $id)
    {
        return view('webservice.room.show', ['id' => $id]);
    }

    public function create()
    {
        return view('webservice.room.create');
    }
}
