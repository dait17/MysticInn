<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use Illuminate\Http\Request;

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
        return view('user.home',compact('randomPhongs'));
    }
}
