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
        Schema::table('revolving_funds', function (Blueprint $table) {
            $table->dropColumn(['earning_by_seed_sale_etc', 'interest_on_released_fund', 'total_earning_available']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_funds', function (Blueprint $table) {
            $table->decimal('earning_by_seed_sale_etc');
            $table->decimal('interest_on_released_fund');
            $table->decimal('total_earning_available');
        });
    }
};
