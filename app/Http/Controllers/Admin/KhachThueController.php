<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachThue;
use Illuminate\Http\Request;

class KhachThueController extends Controller
{
    public function index(Request $request)
    {
        // Lấy các trường tìm kiếm từ request
        $maKT = $request->get('maKT');
        $hoKT = $request->get('hoKT');
        $tenKT = $request->get('tenKT');
        $SDT = $request->get('SDT');
        $CCCD = $request->get('CCCD');
        $gioiTinh = $request->get('gioiTinh');
        $tinh = $request->get('tinh');
        $huyen = $request->get('huyen');
        $xa = $request->get('xa');
        $daXacThuc = $request->get('daXacThuc');

        // Khởi tạo query builder
        $query = KhachThue::query();

        // Lọc theo các trường tìm kiếm với if-else
        if ($maKT) {
            $query->where('maKT', 'like', "%$maKT%");
        }

        if ($hoKT) {
            $query->where('hoKT', 'like', "%$hoKT%");
        }

        if ($tenKT) {
            $query->where('tenKT', 'like', "%$tenKT%");
        }

        if ($SDT) {
            $query->where('SDT', 'like', "%$SDT%");
        }

        if ($CCCD) {
            $query->where('CCCD', 'like', "%$CCCD%");
        }

        if ($tinh) {
            $query->where('tinh', $tinh);
        }

        if ($huyen) {
            $query->where('huyen', $huyen);
        }

        if ($xa) {
            $query->where('xa', $xa);
        }

        // Xử lý lọc theo giới tính
        if (request('gioiTinh')) {
            if (request('gioiTinh') === 'Nam') {
                $query->where('gioiTinh', 0); // Giả sử 0 là Nam
            } elseif (request('gioiTinh') === 'Nữ') {
                $query->where('gioiTinh', 1); // Giả sử 1 là Nữ
            }
        }
        if ($daXacThuc !== null) {
            $query->where('daXacThuc', $daXacThuc);
        }

        // Truy vấn dữ liệu với tất cả các điều kiện
        $khachThues = $query->paginate(5);

        // Lấy dữ liệu cho các trường select
        $tinhData = KhachThue::select('tinh')->distinct()->get();
        $huyenData = KhachThue::select('huyen')->distinct()->get();
        $xaData = KhachThue::select('xa')->distinct()->get();
        $gioiTinhData = KhachThue::select('gioiTinh')->distinct()->get();
        $daXacThucData = KhachThue::select('daXacThuc')->distinct()->get();

        return view('admin.khachthue.index', compact('khachThues', 'tinhData', 'huyenData', 'xaData', 'gioiTinhData','daXacThuc'));
    }

    public function create()
    {
        $lastkt = KhachThue::latest('maKT')->first();
        $newid = $lastkt ? $lastkt->maKT + 1 : 1;
        return view('admin.KhachThue.create',compact('newid'));
    }

    public function store(Request $request)
    {
        $newKT = new KhachThue();

        $newKT->maKT = $request->maKT;
        $newKT->hoKT = $request->hoKT;
        $newKT->tenKT = $request->tenKT;
        $newKT->SDT = $request->SDT;
        $newKT->CCCD = $request->CCCD;
        if($request->gioiTinh=='Nam')
        {
            $newKT->gioiTinh = 0;
        }else{
            $newKT->gioiTinh = 1;
        }
        $newKT->ngaySinh = $request->ngaySinh;
        $newKT->tinh = $request->tinh;
        $newKT->huyen = $request->huyen;
        $newKT->xa = $request->xa;
        if($request->daXacThuc=='Đã xác thực')
        {
            $newKT->daXacThuc = 0;
        }else{
            $newKT->daXacThuc = 1;
        }
        $request->validate([
            'maKT' => 'nullable|alpha_num|max:10',
            'hoKT' => 'nullable|string|max:60',
            'tenKT' => 'nullable|string|max:10',
            'SDT' => 'nullable|digits_between:9,11',
            'CCCD' => 'nullable|digits:12',
            'gioiTinh' => 'nullable|in:Nam,Nữ',
            'tinh' => 'nullable|string|max:100',
            'huyen' => 'nullable|string|max:100',
            'xa' => 'nullable|string|max:100',
            'daXacThuc' => 'nullable|in:Đã xác thực,Chưa xác thực',
        ], [
            'maKT.alpha_num' => 'Mã khách thuê chỉ được chứa ký tự chữ và số.',
            'hoKT.string' => 'Họ không hợp lệ.',
            'tenKT.string' => 'Tên không hợp lệ.',
            'SDT.digits_between' => 'Số điện thoại phải có từ 9 đến 11 chữ số.',
            'CCCD.digits' => 'Căn cước công dân phải có đúng 12 chữ số.',
            'gioiTinh.in' => 'Giới tính không hợp lệ.',
            // Thêm các thông báo lỗi tùy chỉnh khác nếu cần
        ]);

        $newKT->save();

        return redirect()->route('admin.khachthue.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($maKT)
    {
        $khachThue = KhachThue::find($maKT); // Lấy khách thuê từ cơ sở dữ liệu
        return view('admin.khachthue.edit', compact('khachThue'));
    }

    public function update(Request $request, string $id)
    {
        $KT = KhachThue::find($id);

        if($KT){
            $KT->maKT = $request->maKT;
            $KT->hoKT = $request->hoKT;
            $KT->tenKT = $request->tenKT;
            $KT->SDT = $request->SDT;
            $KT->CCCD = $request->CCCD;
            if($request->gioiTinh=='Nam')
            {
                $KT->gioiTinh = 0;
            }else{
                $KT->gioiTinh = 1;
            }
            $KT->ngaySinh = $request->ngaySinh;
            $KT->tinh = $request->tinh;
            $KT->huyen = $request->huyen;
            $KT->xa = $request->xa;
            $KT->daXacThuc = $request->daXacThuc;

            $request->validate([
                'maKT' => 'nullable|alpha_num|max:10',
                'hoKT' => 'nullable|string|max:60',
                'tenKT' => 'nullable|string|max:10',
                'SDT' => 'nullable|digits_between:9,11',
                'CCCD' => 'nullable|digits:12',
                'gioiTinh' => 'nullable|in:Nam,Nữ',
                'tinh' => 'nullable|string|max:100',
                'huyen' => 'nullable|string|max:100',
                'xa' => 'nullable|string|max:100',
                'daXacThuc' => 'nullable|boolean',
            ], [
                'maKT.alpha_num' => 'Mã khách thuê chỉ được chứa ký tự chữ và số.',
                'hoKT.string' => 'Họ không hợp lệ.',
                'tenKT.string' => 'Tên không hợp lệ.',
                'SDT.digits_between' => 'Số điện thoại phải có từ 9 đến 11 chữ số.',
                'CCCD.digits' => 'Căn cước công dân phải có đúng 12 chữ số.',
                'gioiTinh.in' => 'Giới tính không hợp lệ.',
                // Thêm các thông báo lỗi tùy chỉnh khác nếu cần
            ]);
            
            $KT->save();
        }

        return redirect()->route('admin.khachthue.index');
    }

    public function destroy(string $id)
    {
        $khachThue = KhachThue::find($id);
        if($khachThue){
            $khachThue->delete();
            return redirect()->route('admin.khachthue.index');
        }
    }
}
