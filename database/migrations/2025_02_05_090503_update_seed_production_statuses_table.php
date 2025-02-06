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
            $table->string('reason_for_shortfall')->after('reserved_seed')->nullable();
            $table->string('seed_sold')->after('reason_for_shortfall')->nullable();
            $table->date('seed_sold_date')->after('seed_sold')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_production_statuses', function (Blueprint $table) {
            $table->dropColumn('reason_for_shortfall');
            $table->dropColumn('seed_sold');
            $table->dropColumn('seed_sold_date');
        });
    }
};
