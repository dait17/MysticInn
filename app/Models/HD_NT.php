<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HD_NT extends Model
{
    protected $table = 'hd_nt';
    public $timestamps = false;
    protected $fillable = ['maHopDong', 'maNT', 'giaNT', 'trangThai'];

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'maHopDong', 'maHopDong');
    }

    public function noithat()
    {
        return $this->hasOne(HopDong::class, 'maNT', 'maNT');
    }
}
