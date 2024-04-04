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
        Schema::create('delivery_plan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_plan_id');
            $table->string('product_sku');
            $table->integer('planned_quantity');
            $table->string('delivered_by')->nullable();
            $table->string('planned_delivery_date')->nullable();
            $table->string('status')->default(false);
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
            $table->foreign('delivery_plan_id')->references('id')->on('secondary_order_delivery_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_plan_details');
    }
};
