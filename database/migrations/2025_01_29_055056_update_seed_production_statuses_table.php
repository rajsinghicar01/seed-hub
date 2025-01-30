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
        Schema::table('seed_production_statuses', function (Blueprint $table) {
            $table->dropForeign(['seed_target_id']);
            $table->dropColumn('seed_target_id');

            $table->unsignedBigInteger('seed_target_item_id')->unsigned()->nullable()->after('reserved_seed');
            $table->foreign('seed_target_item_id')->references('id')->on('seed_target_items')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_production_statuses', function (Blueprint $table) {
            $table->dropForeign(['seed_target_item_id']);
            $table->dropColumn('seed_target_item_id');

            $table->unsignedBigInteger('seed_target_id')->unsigned()->nullable()->after('reserved_seed');
            $table->foreign('seed_target_id')->references('id')->on('seed_targets')->cascadeOnDelete();
        });
    }
};
