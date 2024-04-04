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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_mode_id');
            $table->unsignedBigInteger('product_item_id');
            $table->integer('quantity');
            $table->string('transaction_date');
            $table->unsignedBigInteger('source_type_id');
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('destination_type_id');
            $table->unsignedBigInteger('destination_id');
            $table->boolean('status')->default(true)->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
