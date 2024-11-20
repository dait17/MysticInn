<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    function index()
    {
        return view('admin.HoaDon');
    }
    public function inds()
    {
        return view('admin.HoaDon.inds');
    }
}
