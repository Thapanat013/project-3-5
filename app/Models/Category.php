<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';  // ใช้ชื่อ 'categories' แทน 'category' หากตารางในฐานข้อมูลใช้ชื่อ 'categories'

    protected $guarded = [
        'created_at',  // แก้ไขเป็น 'created_at'
        'updated_at',  // แก้ไขเป็น 'updated_at'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
