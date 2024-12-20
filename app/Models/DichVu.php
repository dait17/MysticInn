<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = 'dichvu';
    public $timestamps = false;
    protected $primaryKey = 'maDV';

    protected $fillable = ['tenDV', 'giaDV', 'donViTinh', 'batBuoc', 'dvThang'];
}
