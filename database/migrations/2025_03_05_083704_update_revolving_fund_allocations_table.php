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
        Schema::table('revolving_fund_allocations', function (Blueprint $table) {
            $table->unsignedBigInteger('season_id')->unsigned()->nullable()->after('centre_id');
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_fund_allocations', function (Blueprint $table) {
            $table->dropForeign(['season_id']);
            $table->dropColumn('season_id');
        });
    }
};
