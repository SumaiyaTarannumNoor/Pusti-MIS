<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('committees', function (Blueprint $table) {
            $table->string('committee_purpose')->after('purpose');
            $table->dropColumn('purpose');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('committees', function (Blueprint $table) {
            $table->string('purpose')->after('committee_purpose');
            $table->dropColumn('committee_purpose');
        });
    }
};
