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
        Schema::create('primary_order_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_sku_number');
            $table->integer('storage_unit');
            $table->integer('quantity');
            $table->integer('distribution_price');
            $table->integer('gross_amount');
            $table->integer('net_amount');
            $table->unsignedBigInteger('primary_order_id');
            $table->boolean('status')->default(true)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('primary_order_id')->references('id')->on('primary_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_order_product_details');
    }
};
