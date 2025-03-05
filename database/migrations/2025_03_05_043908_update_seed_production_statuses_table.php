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
            $table->string('major_constraints_for_distribution')->after('reason_for_shortfall')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_production_statuses', function (Blueprint $table) {
            $table->dropColumn('major_constraints_for_distribution');
        });
    }
};
