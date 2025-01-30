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
        Schema::table('varieties', function (Blueprint $table) {
            $table->unsignedBigInteger('crop_id')->unsigned()->nullable()->after('release');
            $table->foreign('crop_id')->references('id')->on('crops')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('varieties', function (Blueprint $table) {
            $table->dropForeign(['crop_id']);
            $table->dropColumn('crop_id');
        });
    }
};
