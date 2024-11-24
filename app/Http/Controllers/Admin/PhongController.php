<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnhPhong;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Phong::query();

        // Áp dụng bộ lọc theo diện tích
        if ($request->has('area') && $request->get('area') != '') {
            $query->where('dienTich', '>=', $request->get('area'));
        }

        // Áp dụng bộ lọc theo giá
        if ($request->has('price') && $request->get('price') != '') {
            $query->where('giaPhong', '<=', $request->get('price'));
        }

        // Áp dụng bộ lọc theo tình trạng
        if ($request->has('status') && $request->get('status') != '') {
            $query->where('trangThai', $request->get('status'));
        }

        $phongs = $query->paginate(6);

        return view('admin.phong.index', compact('phongs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastPhong = Phong::latest('maPhong')->first();

        // Tạo mã phòng mới
        $newId = $lastPhong ? $lastPhong->maPhong + 1 : 1;
        return view('Admin.Phong.create', compact('newId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $phong = new Phong();
        $phong->maPhong = $request->maPhong;
        $phong->tenPhong = $request->tenPhong;
        $phong->dienTich = $request->dienTich;
        $phong->giaPhong = $request->giaPhong;
        $phong->ghiChu = $request->ghiChu;
        switch ($request->trangThai) {
            case 'Đã thuê':
                $phong->trangThai = 0;
                break;
            case 'Đang sửa chữa':
                $phong->trangThai = 2;
                break;
            default:
                $phong->trangThai = 1;
                break;
        }
        
        if ($request->hasFile('anhDD')) {
            $image = $request->file('anhDD');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Images'), $imageName);
            $phong->anhDD = $imageName;
        }
        $phong->save();
    
        // Xử lý ảnh chi tiết phòng
        if ($request->hasFile('anhPhong')) {
            foreach ($request->file('anhPhong') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('admin_assets/img_phong'), $imageName);
    
                AnhPhong::create([
                    'maPhong' => $request->maPhong,
                    'duongDan' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.phong.index')->with('success', 'Thêm phòng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phong = Phong::find($id);
        $anhPhong = AnhPhong::where('maPhong', $id)->get();
        $take_5_phong = Phong::where('maPhong', '!=', $id)->take(5)->get();
        if ($phong) {
            return view('admin.phong.show', compact('phong','anhPhong','take_5_phong'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $p = Phong::find($id);
        $anhPhong = AnhPhong::where('maPhong', $id)->get();
        return view('Admin.Phong.edit',compact('p','anhPhong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $phong = Phong::find($id);

        $phong->tenPhong = $request->tenPhong;
        $phong->dienTich = $request->dienTich;
        $phong->giaPhong = $request->giaPhong;
        $phong->ghiChu = $request->ghiChu;
        switch ($request->trangThai) {
            case 'Đã thuê':
                $phong->trangThai = 0;
                break;
            case 'Đang sửa chữa':
                $phong->trangThai = 2;
                break;
            default:
                $phong->trangThai = 1;
                break;
        }

        if ($request->hasFile('anhDD')) {
            $image = $request->file('anhDD');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Images'), $imageName);

            // Xóa ảnh cũ
            if ($phong->anhDD && file_exists(public_path('Images/' . $phong->anhDD))) {
                unlink(public_path('Images/' . $phong->anhDD));
            }
            $phong->anhDD = $imageName;
        }
        if ($request->hasFile('anhPhong')) {
            foreach ($request->file('anhPhong') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('admin_assets/img_phong'), $imageName);
    
                AnhPhong::create([
                    'maPhong' => $id,
                    'duongDan' => $imageName
                ]);
            }
        }
        $phong->save();

        return redirect()->route('admin.phong.index')->with('success', 'Cập nhật phòng thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phong = Phong::find($id);

        if ($phong) {
            // Xóa phòng
            AnhPhong::where('maPhong', $id)->delete();
            $phong->delete();
            return redirect()->route('admin.phong.index')->with('success', 'Phòng đã được xóa thành công.');
        }
    }

    // xóa ảnh trong chi tiết phòng
    public function deleteAnhPhong($phongId, $anhPhongId)
    {
        $anh = AnhPhong::where('maPhong', $phongId)->where('maAnh', $anhPhongId)->first();
        if ($anh) {
            if (file_exists(public_path('admin_assets/img_phong/' . $anh->duongDan))) {
                unlink(public_path('admin_assets/img_phong/' . $anh->duongDan));
            }
            $anh->delete();
            return response()->json(['message' => 'Ảnh đã được xóa.']);
        }

        return response()->json(['message' => 'Không tìm thấy ảnh.'], 404);
    }

}
