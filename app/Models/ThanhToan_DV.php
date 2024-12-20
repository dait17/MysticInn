<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan_DV extends Model
{
    protected $table = 'thanhtoan_dv';
    public $incrementing = false; // Khóa chính không tự tăng
    protected $primaryKey = null; // Không dùng khóa chính mặc định
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['maHoaDon', 'maDKDV', 'soSuDung', 'donGia'];

    public function hoadon()
    {
        return $this->hasOne(HoaDon::class, 'maHoaDon', 'maHoaDon');
    }

    public function dangkydv()
    {
        return $this->hasOne(DangKyDV::class, 'maDKDV', 'maDKDV');
    }
}
