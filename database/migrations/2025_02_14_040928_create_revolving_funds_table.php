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
        Schema::create('revolving_funds', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('centre_id')->index();
            $table->foreign('centre_id')->references('id')->on('centres')->cascadeOnDelete();

            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();

            $table->decimal('released_fund', 5,2)->default('0.00');
            $table->decimal('earning_by_seed_sale_etc', 5,2)->default('0.00');
            $table->decimal('interest_on_released_fund', 5,2)->default('0.00');
            $table->decimal('total_earning_available', 5,2)->default('0.00')->comment('Total Earning Available = Earning by Seed sale etc + Interest on Released Fund');
            $table->decimal('opening_balance', 5,2)->default('0.00')->comment('Opening Balance = Released Fund + Total Earning Available');
            $table->decimal('infrastructure_fund', 5,2)->default('0.00');
            $table->decimal('utilized_infrastructure_fund', 5,2)->default('0.00');
            $table->decimal('available_infrastructure_fund', 5,2)->default('0.00')->comment('Available infrastructure fund = Infrastructure fund + Utilized_infrastructure_fund');
            $table->softDeletes();
            $table->timestamps();
        });
    }
     
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revolving_funds');
    }
};
