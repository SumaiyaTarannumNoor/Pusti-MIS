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
        Schema::create('secondary_order_delivery_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_title');
            $table->unsignedBigInteger('secondary_order_id');
            $table->string('status')->default(false)->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secondary_order_delivery_plans');
    }
};
