<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DangKyDV extends Model
{
    protected $table = 'dangkydv';
    public $timestamps = false;
    protected $primaryKey = 'maDKDV';

    protected $fillable = ['maDV', 'maHopDong', 'ngayDK', 'ngayHuy', 'trangThai'];

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'maHopDong', 'maHopDong');
    }

    public function dichvu()
    {
        return $this->hasOne(DichVu::class, 'maDV', 'maDV');
    }

}
