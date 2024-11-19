<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhachThueController extends Controller
{
    function index()
    {
        return view('admin.KhachThue.index');
    }
    function create()
    {
        return view('admin.KhachThue.create');
    }
}
