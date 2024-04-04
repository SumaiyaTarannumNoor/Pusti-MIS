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
        Schema::create('planned_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_mode_id');
            $table->integer('payable_amount');
            $table->unsignedBigInteger('order_id');
            $table->date('payment_date');
            $table->string('attached_file_name');
            $table->unsignedBigInteger('bank_id');
            $table->string('bank_account_number');
            $table->boolean('status')->default(true)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();  
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
            $table->foreign('payment_mode_id')->references('id')->on('payment_modes')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('primary_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planned_payment_details');
    }
};
