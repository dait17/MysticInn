<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\NhanVien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $employees = NhanVien::with('chucvu')->paginate(6);
            return view('admin.nhanvien.index', compact('employees'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = ChucVu::all();
        return view('admin.nhanvien.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //user
        $ho = $request->hoNV;
        $ten = $request->tenNV;
        $chucVu = ChucVu::find($request->maCV)->TENCV;

        // Lấy ký tự đầu của họ và tên
        $username = strtolower(substr($ho, 0, 1) .".". substr($ten, 0, 1));
        $CV = implode('', array_map(function($word) {
            return strtolower(substr($word, 0, 1));
        }, explode(' ', $chucVu)));

        // Kết hợp họ tên và chức vụ
        $username = $username.".". $CV;

        //lấy DoB làm password
        $dateParts = explode('-', $request->ngaySinh);
        $pass = $dateParts[2] . $dateParts[1] . $dateParts[0];
        $user = new User();
        $user->username = $username.rand(1000,9999);
        $user->email = $request->email;
        $user->password = Hash::make($pass);
        $user->userType = 1;
        $user->save();

        //nhân viên
        $employee = new NhanVien();
        $employee->hoNV = $request->hoNV;
        $employee->tenNV = $request->tenNV;
        $employee->ngaySinh = $request->ngaySinh;
        if($request->gioiTinh == "Nam"){
            $employee->gioiTinh = 1;
        }
        else{
            $employee->gioiTinh = 0;
        }
        $employee->CCCD = $request->CCCD;
        $employee->SDT = $request->SDT;
        $employee->email = $request->email;
        $employee->tinh = $request->tinh;
        $employee->huyen = $request->huyen;
        $employee->xa = $request->xa;
        $employee->maCV = $request->maCV;
        $employee->maTK = $user->id;
        
        if ($request->hasFile('anhDD')) {
            $image = $request->file('anhDD');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('admin_assets/img/'), $imageName);
            $employee->anhDD = $imageName;
        }
        $employee->save();
        return redirect()->route('admin.nhanvien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = NhanVien::find($id);
        $positions = ChucVu::all();
        return view('admin.nhanvien.edit', compact('employee','positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = NhanVien::find($id);
        $employee->hoNV = $request->hoNV;
        $employee->tenNV = $request->tenNV;
        $employee->ngaySinh = $request->ngaySinh;
        $employee->gioiTinh = $request->gioiTinh;
        $employee->CCCD = $request->CCCD;
        $employee->SDT = $request->SDT;
        $employee->email = $request->email;
        $employee->tinh = $request->tinh;
        $employee->huyen = $request->huyen;
        $employee->xa = $request->xa;
        $employee->maCV = $request->maCV;

        if ($request->hasFile('anhDD')) {
            $image = $request->file('anhDD');
            $imageName = $image->getClientOriginalName();
            $request->file('anhDD')->move(public_path('admin_assets/img/'), $imageName);
            $employee->anhDD = $imageName;
        }

        $employee->save();

        return redirect()->route('admin.nhanvien.index')->with('success', 'Cập nhật nhân viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = NhanVien::find($id);
        $acc = User::find($employee->maTK);
        if($employee){
            $employee->delete();
            $acc->delete();
            return redirect()->route('admin.nhanvien.index');
        }
    }
}
