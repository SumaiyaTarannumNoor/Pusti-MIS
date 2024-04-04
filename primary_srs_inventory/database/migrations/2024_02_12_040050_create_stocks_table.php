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
        Schema::create('stocks', function (Blueprint $table) {
            // Keep the default auto-incrementing primary key
            $table->id();
        
            $table->unsignedBigInteger('product_item_id');
            $table->unsignedBigInteger('batch_number');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('production_date')->nullable();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('supplier_type_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('receiving_time')->nullable();
            $table->integer('quantity');
            $table->string('expiry_date');
            $table->string('status')->default(false)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
        
            
            // Define foreign key constraints
            // $table->foreign('batch_number')->references('batch_number')->on('product_batches')->onDelete('cascade');
            $table->foreign('supplier_type_id')->references('id')->on('supplier_types')->onDelete('cascade');
        });
        

        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
