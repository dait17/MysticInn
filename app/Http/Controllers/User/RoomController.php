<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AnhPhong;
use App\Models\Phong;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    function index(Request $request)
    {
        $phong = $request->input('phong');
        $gia = $request->input('gia');
        $roomName = $request->input('roomName');
        echo $phong;
        $query = Phong::query();
        if ($phong) {
            if ($phong == "set") {
                $query->where('trangThai', 0);
            } elseif ($phong == "unset") {
                $query->where('trangThai', 1);
            }
        }
        if ($gia === 'set') {
            $query->orderBy('giaPhong', 'asc');
        } elseif ($gia === 'unset') {
            // Sắp xếp tăng dần theo trường 'giaPhong'
            $query->orderBy('giaPhong', 'desc');
        }

        if ($roomName) {
            $query->where('tenPhong', 'like', '%' . $roomName . '%');
        }
    
        $phongs = $query->get();
        return view('user.room',compact('phongs'));
    }
    public function Show($maPhong){
        $phong = Phong::find($maPhong);
        $anhPhongs = AnhPhong::where('maPhong', $maPhong)->get();
        $phongs = Phong::where('trangThai', 0)->get();
        $randomPhongs = null;
        if ($phongs->count() > 5) {
            $randomPhongs = Phong::where('trangThai', 0)->inRandomOrder()->take(5)->get();
        } else {
            $randomPhongs = $phongs;
        }
        return view('user.RoomDetails',compact('phong',"anhPhongs",'randomPhongs'));
    }
}
