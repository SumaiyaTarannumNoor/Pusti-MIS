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
        Schema::create('primary_order_product_delivery_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_assigned_product_id');
            $table->unsignedBigInteger('storage_id');
            $table->integer('quantity');
            $table->boolean('status')->default(true)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
            $table->foreign('po_assigned_product_id', 'fk_poa_product_id')->references('id')->on('primary_order_product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_order_product_delivery_plans');
    }
};
