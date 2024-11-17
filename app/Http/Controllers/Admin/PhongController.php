<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    function index()
    {
        return view('admin.Phong');
    }
}
