<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    protected $table = 'hopdong';
    public $timestamps = false;
    protected $primaryKey = 'maHopDong';
    protected $fillable = ['maPhong', 'maKT', 'userId', 'ngayKy', 'ngayHetHan', 'ngayKetThuc', 'giaThue', 'tienCoc'];

    public function user()
    {
        return $this->hasOne(User::class, 'userId', 'id');
    }

    public function phong()
    {
        return $this->hasOne(Phong::class, 'maPhong', 'maPhong');
    }

    public function khachthue()
    {
        return $this->hasOne(KhachThue::class, 'maKT', 'maKT');

    }
}
