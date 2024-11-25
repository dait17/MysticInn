<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuangCao extends Model
{
    protected $table = 'quangcao';
    public $timestamps = false;
    protected $primaryKey = 'MAQC';
    protected $fillable = [
        'TENQC',
        'NGAYTAO', 
        'NGAYCHAY',  
        'NGAYGO',  
        'DUONGDAN', 
        'ANHQC',
    ];

}