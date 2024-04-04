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
        Schema::table('distributors', function (Blueprint $table) {
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('area_id');
            $table->string('distributor_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('the', function (Blueprint $table) {
            //
        });
    }
};
