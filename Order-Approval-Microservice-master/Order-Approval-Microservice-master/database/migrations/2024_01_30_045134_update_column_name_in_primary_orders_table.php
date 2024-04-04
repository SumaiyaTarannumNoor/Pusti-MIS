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
        Schema::table('primary_orders', function (Blueprint $table) {
            $table->string('has_delivery_approval')->after('has_delivary_approval');
            $table->dropColumn('has_delivary_approval');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('primary_orders', function (Blueprint $table) {
            $table->string('has_delivary_approval')->after('has_delivery_approval');
            $table->dropColumn('has_delivery_approval');
        });
    }
};
