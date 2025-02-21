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
        Schema::table('seed_target_items', function (Blueprint $table) {
            // Ensure unique combination of seed_target_id, variety_id, and category_id
            $table->unique(['seed_target_id', 'variety_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_target_items', function (Blueprint $table) {
            //
        });
    }
};
