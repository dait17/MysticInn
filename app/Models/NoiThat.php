<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoiThat extends Model
{
    protected $table = 'noiThat';
    protected $timestamp = false;
    protected $primaryKey = 'maNT';

    protected $fillable = ['tenNT', 'giaNT'];
}
