<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HD_KT extends Model
{
    protected $table = 'hd_kt';
    public $timestamps = false;

    protected $fillable = ['maHopDong', 'maKT', 'ngayVao', 'ngayRoiDi'];

    function hopdong()
    {
        return $this->hasOne(HopDong::class, 'maHopDong', 'maHopDong');
    }

    function khachthue()
    {
        return $this->hasOne(KhachThue::class, 'maKT', 'maKT');
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('maHopDong', $this->getAttribute('maHopDong'))
            ->where('maKT', $this->getAttribute('maKT'));
    }
}
