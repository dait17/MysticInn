<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachThue extends Model
{
    protected $table = 'khachthue';
    protected $timestamp = false;
    protected $primaryKey = 'maKT';

    protected $fillable = ['hoKT', 'tenKT', 'ngaySinh', 'gioiTinh', 'CCCD', 'SDT', 'tinh', 'huyen', 'xa', 'daXacThuc'];
}
