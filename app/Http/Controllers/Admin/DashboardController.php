<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $phongTrong = Phong::where('trangThai', 'trong')->count();
        $phongThue = Phong::where('trangThai', 'da_thue')->count();
        return view('admin.dashboard', compact('phongTrong', 'phongThue'));
    }
}
