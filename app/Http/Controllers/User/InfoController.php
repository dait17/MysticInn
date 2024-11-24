<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HD_KT;
use App\Models\HopDong;
use App\Models\KhachThue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class InfoController extends Controller
{
    public function index($userId)
    {
        $hopdong = HopDong::where('userID', $userId)->first();
        $hd_kts = HD_KT::where('maHopDong', $hopdong->maHopDong)->get();
        return view('user.Info.index', compact('hopdong', 'hd_kts'));
    }

    public function edit($id)
    {
        $kt = KhachThue::find($id);
        return view('user.Info.edit', compact('kt'));
    }

    public function update(Request $request)
    {
        $data = $request->only(['maKT', 'hoKT', 'tenKT', 'ngaySinh', 'gioiTinh', 'SDT', 'CCCD', 'tinh', 'huyen', 'xa']);

//        $validated = $request->validate([
//            'ngaySinh' => 'required|date_format:Y-m-d',
//            'gioiTinh' => 'required|boolean', // Chỉ nhận 0 hoặc 1
//            'huyen'    => 'required|string|max:255',
//            'xa'       => 'required|string|max:255',
//        ]);

        // Tìm khách thuê
        $khachThue = KhachThue::findOrFail($data['maKT']);

        // Cập nhật thông tin
        $khachThue->ngaySinh = $data['ngaySinh'];
        $khachThue->gioiTinh = (boolean)$data['gioiTinh'];
        $khachThue->huyen = $data['huyen'];
        $khachThue->xa = $data['xa'];

        // Lưu thay đổi
        $khachThue->save();

        return redirect()->route('info', Auth::user()->id);
    }

    public function create($maHopDong)
    {

        return view('user.Info.create', compact('maHopDong'));
    }

    public function store(string $maHopDong, Request $request)
    {
//        $data = $request->only(['hoKT', 'tenKT', 'ngaySinh', 'gioiTinh', 'SDT', 'CCCD', 'tinh', 'huyen', 'xa']);
        $validatedData = $request->validate([
            'hoKT'    => 'required|string|max:255',
            'tenKT'   => 'required|string|max:255',
            'ngaySinh'=> 'required|date|before:today', // Ngày sinh phải trước ngày hiện tại
            'gioiTinh'=> 'required|boolean', // Chỉ nhận 0 hoặc 1
            'SDT'     => 'required|numeric|digits_between:10,15',
            'CCCD'    => 'nullable|numeric|digits:12', // CCCD nếu có phải đúng 12 chữ số
            'tinh'    => 'required|string|max:255',
            'huyen'   => 'required|string|max:255',
            'xa'      => 'required|string|max:255',
        ], [
            'hoKT.required'    => 'Trường họ là bắt buộc.',
            'tenKT.required'   => 'Trường tên là bắt buộc.',
            'ngaySinh.required'=> 'Ngày sinh không được để trống.',
            'ngaySinh.before'  => 'Ngày sinh phải trước ngày hôm nay.',
            'gioiTinh.required'=> 'Vui lòng chọn giới tính.',
            'SDT.required'     => 'Số điện thoại không được để trống.',
            'SDT.digits_between' => 'Số điện thoại phải có từ 10 đến 15 chữ số.',
            'CCCD.digits'      => 'CCCD phải gồm đúng 12 chữ số.',
            'tinh.required'    => 'Trường tỉnh là bắt buộc.',
            'huyen.required'   => 'Trường huyện là bắt buộc.',
            'xa.required'      => 'Trường xã là bắt buộc.',
        ]);

        $validatedData['gioiTinh'] = (boolean)$validatedData['gioiTinh'];
        $kt = KhachThue::create($validatedData);
        $hd_kt_data = [
            'maKT' => $kt->maKT,
            'maHopDong' => $maHopDong,
            'ngayVao' => Date::now(),
        ];
        HD_KT::create($hd_kt_data);
        $userId = Auth::user()->id;
        return redirect()->route('info', compact('userId'));

    }

    public function destroy($maHopDong, $maKT)
    {
        HD_KT::where('maHopDong', $maHopDong)->where('maKT', $maKT)->delete();
        return redirect()->back();
    }
}
