<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'thongbao';

    public $timestamps = false;

    protected $fillable = ['userId', 'tieuDe', 'noiDung', 'ngayTao', 'duongDan'];
}
