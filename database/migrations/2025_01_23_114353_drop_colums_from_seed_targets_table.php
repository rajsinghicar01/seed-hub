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
            $table->dropForeign(['crop_id']);
            $table->dropColumn('crop_id');
            $table->dropForeign(['variety_id']);
            $table->dropColumn('variety_id');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('total_seed_quantity');
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
