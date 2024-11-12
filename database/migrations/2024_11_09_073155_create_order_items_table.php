<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // ความสัมพันธ์กับคำสั่งซื้อ
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // ความสัมพันธ์กับสินค้า
            $table->string('product_name');  // ชื่อสินค้า
            $table->integer('quantity');  // จำนวนสินค้า
            $table->decimal('price', 10, 2);  // ราคาต่อหน่วย
            $table->timestamps();  // บันทึกวันที่และเวลา
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
