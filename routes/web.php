<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DichVuController;
use App\Http\Controllers\Admin\HD_KTController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\HopDongController;
use App\Http\Controllers\Admin\KhachThueController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\NoiThatController;
use App\Http\Controllers\Admin\PhongController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyRoomController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\User\RoomController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/phong', [RoomController::class, 'index'])->name('room');
Route::get('/dangnhap', function (){
   if (Auth::check()) {
       return redirect('/');
   }
   return view('login');
});
Route::get('/dangxuat',[LoginController::class,'logout'])->name('logout');
Route::get('/chitietphong',function (){
    return view('user.RoomDetails');
})->name('roomdetail');
//Route::get('/dangnhap', [LoginController::class, 'index'])->name('login');
Route::post('/dangnhap', [LoginController::class, 'login'])->name('login');
Route::get('/phongcuatoi', function () {
    if (!Auth::check()) {
        return redirect('/dangnhap');
    }
    return view('user.myroom');
});
Route::post('/phongcuatoi', [MyRoomController::class, 'index'])->name('myroom');

Route::get('/thongtin/{userId}', [InfoController::class, 'index'])->name('info');
Route::get('/thongtin/capnhat/{userId}', [InfoController::class, 'edit'])->name('info.edit');
Route::post('/thongtin/capnhat', [InfoController::class, 'update'])->name('info.update');
Route::get('/thongtin/them/{maHopDong}', [InfoController::class, 'create'])->name('info.create');
Route::post('/thongtin/them/{maHopDong}', [InfoController::class, 'store'])->name('info.store');
Route::delete('/thongtin/xoa/{maHopDong}/{maKT}', [InfoController::class, 'destroy'])->name('info.destroy');

Route::middleware([CheckPermission::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('hopdong/laygiaphong', [HopDongController::class, 'layGiaPhong'])->name('hopdong.laygiaphong');
        Route::post('hopdong/xacnhannt', [HopDongController::class, 'storeNoiThat'])->name('hopdong.xacnhannt');
        Route::post('hopdong/xacthuckt/{maKT}', [HopDongController::class, 'xacThucKT'])->name('hopdong.xacthuckt');
        Route::get('hd_kt/{maHopDong}', [HD_KTController::class, 'index'])->name('hd_kt.index');
        Route::post('hd_kt/store', [HD_KTController::class, 'store'])->name('hd_kt.store');
        Route::post('hd_kt/update', [HD_KTController::class, 'update'])->name('hd_kt.update');
        Route::get('hd_kt/edit/{maHopDong}/{maKT}', [HD_KTController::class, 'edit'])->name('hd_kt.edit');
        Route::post('hd_kt/change', [HD_KTController::class, 'changeDD'])->name('hd_kt.change');
        Route::get('hopdong/traPhong{maHopDong}', [HopDongController::class, 'traPhong'])->name('hopdong.traphong');
        Route::get('hopdong/xuatfile{maHopDong}', [HopDongController::class, 'exportToWord'])->name('hopdong.xuatfile');
        Route::delete('hd_kt/{maHopDong}/{maKT}', [HD_KTController::class, 'destroy'])->name('hd_kt.destroy');
        Route::resources([
            'hopdong'=> HopDongController::class
        ]);
        Route::resource('phong', PhongController::class);
        Route::resource('noithat', NoiThatController::class);
        Route::resource('nhanvien', NhanVienController::class);
        Route::resource('dichvu', DichVuController::class);
        Route::resource('khachthue', KhachThueController::class);
        Route::get('hoadon/inds', [HoaDonController::class, 'inds'])->name('hoadon.inds');
        Route::resource('hoadon', HoaDonController::class);
    });
});


//Route::prefix('/admin')->group(function () {
//   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//})->middleware(CheckPermission::class);


