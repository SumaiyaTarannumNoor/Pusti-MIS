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
        Schema::create('supplier_types', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_type_name');
            $table->boolean('status')->default(false)->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_types');
    }
};
