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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('category')->nullable();
            $table->string('product_description')->nullable();
            $table->string('extra_small_price')->nullable();
            $table->string('small_price')->nullable();
            $table->string('medium_price')->nullable();
            $table->string('large_price')->nullable();
            $table->string('i_extra_large_price')->nullable();
            $table->string('ii_extra_large_price')->nullable();
            $table->string('iii_extra_large_price')->nullable();
            $table->string('iiii_extra_large_price')->nullable();
            $table->string('iiiii_extra_large_price')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
