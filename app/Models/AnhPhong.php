<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnhPhong extends Model
{
    protected $table = 'anhphong';

    protected $primaryKey = 'maAnh';

    public $timestamps = false;

    protected $fillable = ['maPhong', 'duongDan'];

    function phong()
    {
        return $this->hasOne(Phong::class, 'maPhong', 'maPhong');
    }
}
