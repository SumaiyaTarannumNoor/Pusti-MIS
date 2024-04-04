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
        Schema::create('secondary_order_delivery_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('secondary_order_id');
            $table->unsignedBigInteger('pos_id');
            $table->boolean('is_otc');
            $table->string('product_sku');
            $table->integer('delivered_quantity');
            $table->string('delivered_by');
            $table->string('delivered_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('ip');
            $table->string('browser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secondary_order_delivery_histories');
    }
};
