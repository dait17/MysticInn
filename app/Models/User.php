<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'userType',
        'username',
        'email',
        'password',
    ];

}
