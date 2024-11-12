<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Migration สำหรับสร้างตาราง categories
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();  // เพิ่มการลบแบบอ่อน
        });
    }

    public function down(): void
    {
        // แก้ไขชื่อจาก 'category' เป็น 'categories'
        Schema::dropIfExists('categories');
    }
};
