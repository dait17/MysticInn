<?php

namespace App\Providers;

use App\Models\NhanVien;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('user.layouts.layout', function ($view) {
            $thongbaos = [];

            if (Auth::check()) {
                $userId = Auth::user()->id;
                $thongbaos = ThongBao::where('userId', $userId)
                    ->orderBy('ngayTao', 'desc') // Sắp xếp theo ngày tạo, giảm dần
                    ->take(5)                      // Giới hạn 5 bản ghi
                    ->get();
            }

            $view->with('thongbaos', $thongbaos);
        });

        View::composer('admin.layouts.DashboardLayout', function ($view) {

            $nhanvien = null;
            if (Auth::check()) {
                $userId = Auth::user()->id;
                $nhanvien = NhanVien::where('maTK', $userId)->first();

                $thongbaos = ThongBao::where('userId', $userId)->get();
            }

            $view->with('nhanvien', $nhanvien)->with('thongbaos', $thongbaos);
        });

    }
}
