<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    protected $table = 'loaitaikhoan';
    public $timestamps = false;
    protected $primaryKey = 'maLoai';

    protected $fillable = ['tenLoai'];
}
