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
        Schema::create('secondary_delivery_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('total_sku');
            $table->integer('total_category');
            $table->integer('total_price');
            $table->unsignedBigInteger('route_id');
            $table->integer('total_visited_pos');
            $table->integer('total_memo');
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
        Schema::dropIfExists('secondary_delivery_summaries');
    }
};
