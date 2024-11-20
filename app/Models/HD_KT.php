<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HD_KT extends Model
{
    protected $table = 'hd_kt';
    protected $timestamp = false;
    protected $fillable = ['maHopDong', 'maKT', 'ngayVao', 'ngayRoiDi'];

    function hopdong()
    {
        return $this->hasOne(HopDong::class, 'maHopDong', 'maHopDong');
    }

    function khachthue()
    {
        return $this->hasOne(KhachThue::class, 'maKT', 'maKT');
    }
}
