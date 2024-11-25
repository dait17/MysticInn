<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use App\Models\QuangCao;

class HomeController extends Controller
{
    function index(){
        $phongs = Phong::where('trangThai', 0)->get();
        $randomPhongs = null;
        if ($phongs->count() > 4) {
            $randomPhongs = Phong::where('trangThai', 0)->inRandomOrder()->take(4)->get();
        } else {
            $randomPhongs = $phongs;
        }


        // quảng cáo
        $qc = QuangCao::where(function($query) {
            $query->whereNull('NGAYGO')
                  ->orWhere('NGAYGO', '!=', now()->format('Y-m-d'));
        })->first();
        return view('user.home',compact('randomPhongs','qc'));
    }
}
