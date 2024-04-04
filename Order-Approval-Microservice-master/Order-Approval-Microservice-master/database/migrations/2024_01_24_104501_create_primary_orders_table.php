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
        Schema::create('primary_orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('has_delivary_approval')->default(true);
            $table->boolean('is_delivery_approval_approved')->default(true);
            $table->unsignedBigInteger('distributor_id');
            $table->unsignedBigInteger('assigned_committee_id');
            $table->string('current_approver')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
            $table->foreign('assigned_committee_id')->references('id')->on('committees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_orders');
    }
};
