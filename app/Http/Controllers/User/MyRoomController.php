<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\HopDong;
use App\Models\SDDichVu;
use App\Models\ThanhToan_DV;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyRoomController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $hopdong = Hopdong::where('userId', $userId)->first();
        $hoadons = HoaDon::where('maHopDong', $hopdong->maHopDong)->get();

        $data_hoadons = [];
        foreach ($hoadons as $hoadon) {
            $tongtien = $hoadon->hopdong->giaThue;
            $ttdvs = ThanhToan_DV::where('maHoaDon', $hoadon->maHoaDon)->get();
            foreach ($ttdvs as $ttdv) {
                $tongtien += $ttdv->soSuDung * $ttdv->donGia;
            }
            $data_hoadons[] = [
                'maHoaDon' => $hoadon->maHoaDon,
                'thang' => $hoadon->thang,
                'nam' => $hoadon->nam,
                'tongtien' => $tongtien,
                'trangThai' => $hoadon->tranThai,
            ];
        }
//        dd($data_hoadons);

        return view('user.MyRoom.index', compact('hopdong', 'hoadons', 'data_hoadons'));
    }

    public function show($maHoaDon)
    {
        $hoadon = HoaDon::find($maHoaDon);
        $thanhtoan_dvs = ThanhToan_DV::where('maHoaDon', $maHoaDon)->get();
        $sudungs = $this->laySDDichVuToArray($maHoaDon);
        return view('user.MyRoom.chitiethoadon', compact('hoadon', 'sudungs', 'thanhtoan_dvs'));
    }
    private function laySDDichVuToArray($maHoaDon)
    {
        $sudungs = SDDichVu::where('maHoaDon', $maHoaDon)->get()->toArray();
        $data = [];
        foreach ($sudungs as $sudung) {
            $data[$sudung['maDKDV']] = [
                'soDau' => $sudung['soDau'],
                'soCuoi' => $sudung['soCuoi']
            ];
        }
        return $data;

    }

    public function thanhToan($maHoaDon)
    {

    }

}
