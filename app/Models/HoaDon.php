<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';
    public $timestamps = false;
    protected $primaryKey = 'maHoaDon';

    protected $fillable = ['maHopDong', 'nam', 'thang', 'trangThai'];

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'maHopDong', 'maHopDong');
    }
}
