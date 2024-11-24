<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    public $timestamps = false;
    protected $primaryKey = 'maNV';
    protected $fillable = [
        'hoNV', 'tenNV', 'ngaySinh', 'gioiTinh', 
        'CCCD', 'SDT', 'email', 'tinh', 'huyen', 'xa', 
        'maCV', 'maTK', 'anhDD'
    ];

    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'maCV', 'MACV');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'maTK', 'id');
    }
}
