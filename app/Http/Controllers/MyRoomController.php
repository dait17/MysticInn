<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyRoomController extends Controller
{
    public function index()
    {
        return view('user.myroom');
    }


}
