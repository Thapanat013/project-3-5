<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Products extends Model
{

    use HasFactory;
    use SoftDeletes;


    protected $table ='products';

    // protected $fillable = ['name', 'price', 'description', 'category_id'];

    protected $guarded = [

        'created_at',
        'updated_at',

    ];



    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class, 'category_id','id');

    }

}
