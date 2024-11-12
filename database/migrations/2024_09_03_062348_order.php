<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->decimal('price', 10, 2);
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->unsignedBigInteger('category_id');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
