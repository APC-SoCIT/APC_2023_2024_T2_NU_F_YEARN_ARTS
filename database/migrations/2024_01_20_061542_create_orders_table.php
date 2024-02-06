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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('user_id')->nullable();

            $table->string('order_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('primaryclr')->nullable();
            $table->string('secondaryclr')->nullable();
            $table->string('size')->nullable();
            $table->string('product_id')->nullable();       

            $table->string('order_received_at')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
