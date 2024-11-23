<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';
    public $timestamps = false;
    protected $primaryKey = 'maPhong';

    protected $fillable = ['tenPhong', 'dienTich', 'giaPhong', 'ghiChu', 'trangThai', 'anhDD'];
}
