<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyRoomController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RoomController;
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
//Route::get('/dangnhap', [LoginController::class, 'index'])->name('login');
Route::post('/dangnhap', [LoginController::class, 'login'])->name('login');
Route::get('/phongcuatoi', function () {
    if (!Auth::check()) {
        return redirect('/dangnhap');
    }
    return view('user.myroom');
});
Route::post('/phongcuatoi', [MyRoomController::class, 'index'])->name('myroom');

