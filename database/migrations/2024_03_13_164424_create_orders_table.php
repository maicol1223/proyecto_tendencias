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
            $table->decimal('total_amount', 10, 2);
           $table->dateTime('date_order');
           $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
           ->references('id')
           ->on('clients');
           $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
           ->references('id')
           ->on('products');
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
