<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Thêm cột created_at và updated_at vào bảng user
        Schema::table('user', function (Blueprint $table) {
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        // Nếu cần roll back, xóa cột created_at và updated_at
        Schema::table('user', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
