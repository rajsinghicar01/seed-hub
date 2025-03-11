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
            $table->string('description')->after('total_fund_allocation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_fund_allocations', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
