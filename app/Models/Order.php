<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Order extends Model
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // ชื่อสินค้า
            $table->string('order_ref')->unique();  // หมายเลขออเดอร์'
            $table->decimal('total_price', 8, 2);
            $table->string('status')->default('pending'); // สถานะ
            $table->timestamps();
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }   


    public function down(): void
    {
        Schema::dropIfExists('orders'); // แก้ไขจาก 'order' เป็น 'orders'
    }
};
