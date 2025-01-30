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
        Schema::table('seed_targets', function (Blueprint $table) {
            $table->unsignedBigInteger('crop_id')->unsigned()->nullable()->after('season_id');
            $table->foreign('crop_id')->references('id')->on('crops')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_targets', function (Blueprint $table) {
            //
        });
    }
};
