<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->change(); // ทำให้ description เป็น nullable
        });
    }

    public function down(): void
    {
        //
    }
};
