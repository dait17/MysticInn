<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DichVuController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\HopDongController;
use App\Http\Controllers\Admin\KhachThueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyRoomController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RoomController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Auth;
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

Route::middleware([CheckPermission::class])->group(function () {
   Route::prefix('admin')->name('admin.')->group(function () {
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
      Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
      Route::get('/hoadon', [HoaDonController::class, 'index'])->name('hoadon');
      Route::get('/hoadon/in', [HoaDonController::class, 'inds'])->name('hoadon.in');
      Route::get('/khachthue', [KhachThueController::class, 'index'])->name('khachthue');
      Route::get('/phong', [KhachThueController::class, 'index'])->name('phong');
      Route::resource('/dichvu',DichVuController::class);

   });
});

//Route::prefix('/admin')->group(function () {
//   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//})->middleware(CheckPermission::class);


