<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items'; // ชื่อตารางที่ต้องการ

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price']; // คอลัมน์ที่สามารถบันทึกได้

    // ความสัมพันธ์กับ Product
    public function product()
    {
        return $this->belongsTo(Products::class);  // เชื่อมโยงกับ Product
    }

    // ความสัมพันธ์กับ Order
    public function order()
    {
        return $this->belongsTo(Order::class); // Laravel จะหาความสัมพันธ์กับ primary key (id) อัตโนมัติ
    }

    public function index()
    {
        // ดึงคำสั่งซื้อพร้อมกับ items และ product โดยใช้ eager loading
        $orders = Order::with('items.product')->get();

        // ส่งข้อมูลไปยังวิว
        return view('admin.order.index', compact('orders'));
    }
}
