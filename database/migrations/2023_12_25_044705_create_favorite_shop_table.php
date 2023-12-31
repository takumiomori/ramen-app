<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorite_shop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('favorite_id');
            $table->unsignedBigInteger('shop_id');
            $table->timestamps();

            $table->foreign('favorite_id')->references('id')->on('favorites')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_shop');
    }
};
