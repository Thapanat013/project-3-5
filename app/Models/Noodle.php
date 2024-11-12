<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noodle extends Model
{
    use HasFactory;

    protected $fillable = [
        'noodles ', 'soup', 'meat', 'type', 'table_number', 'notes'
    ];
}

