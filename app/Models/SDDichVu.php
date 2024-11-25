<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SDDichVu extends Model
{
    protected $table = 'sudungdv';
    public $incrementing = false; // Khóa chính không tự tăng
    protected $primaryKey = null; // Không dùng khóa chính mặc định
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['maHoaDon', 'maDKDV', 'soDau', 'soCuoi', 'ngayDau', 'ngayCuoi'];

    public function hoadon()
    {
        return $this->hasOne('HoaDon', 'maHoaDon', 'maHoaDon');
    }

    public function dangkydv()
    {
        return $this->hasOne('dangkydv', 'maDKDV', 'maDKDV');
    }
}
