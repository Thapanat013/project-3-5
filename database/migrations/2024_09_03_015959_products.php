<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
  public function up(): void{Schema::create('products', function (Blueprint $table){

            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->string('detail')->nullable();


            $table->timestamps();
            $table->softDeletes();


        });
    }

     
  public function down(): void
  {Schema::dropIfExists('products');}
};