<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong_NT extends Model
{
    protected $table = 'phong_nt';

    public $timestamps = false;

    protected $fillable = [
        'maPhong',
        'maNT'
    ];

    public function phong()
    {
        return $this->hasOne(Phong::class, 'maPhong', 'maPhong');
    }

    public function noithat()
    {
        return $this->hasOne(NoiThat::class, 'maNT', 'maNT');
    }
}
