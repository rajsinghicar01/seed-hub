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
            $table->string('surplus_seed')->after('seed_sold_date')->comment('surplus_seed = seed_available_for_sale + reserved_seed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_production_statuses', function (Blueprint $table) {
            $table->dropColumn('surplus_seed');
        });
    }
};
