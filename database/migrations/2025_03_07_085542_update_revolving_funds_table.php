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
            $table->decimal('infrastructure_fund', 5,2)->nullable()->change();
            $table->decimal('utilized_infrastructure_fund', 5,2)->nullable()->change();
            $table->decimal('available_infrastructure_fund', 5,2)->nullable()->change();
            $table->decimal('training_organized', 5,2)->nullable()->change();
            $table->decimal('field_day', 5,2)->nullable()->change();
            $table->decimal('seed_procurement', 5,2)->nullable()->change();
            $table->decimal('seed_quantity', 5,2)->nullable()->change();
            $table->decimal('procurement_rate', 5,2)->nullable()->change();
            $table->decimal('farm_operations', 5,2)->nullable()->change();
            $table->decimal('other_activities', 5,2)->nullable()->change();
            $table->decimal('total_expenditures', 5,2)->nullable()->change();
            $table->decimal('seed_sold', 5,2)->nullable()->change();
            $table->decimal('seed_sold_rate', 5,2)->nullable()->change();
            $table->decimal('amount_receipt', 5,2)->nullable()->change();
            $table->decimal('interest_on_released_fund', 5,2)->nullable()->change();
            $table->decimal('total_incomes', 5,2)->nullable()->change();
            $table->decimal('opening_balance', 5,2)->nullable()->change();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_funds', function (Blueprint $table) {
            $table->decimal('infrastructure_fund', 5,2)->nullable(false)->change();
            $table->decimal('utilized_infrastructure_fund', 5,2)->nullable(false)->change();
            $table->decimal('available_infrastructure_fund', 5,2)->nullable(false)->change();
            $table->decimal('training_organized', 5,2)->nullable(false)->change();
            $table->decimal('field_day', 5,2)->nullable(false)->change();
            $table->decimal('seed_procurement', 5,2)->nullable(false)->change();
            $table->decimal('seed_quantity', 5,2)->nullable(false)->change();
            $table->decimal('procurement_rate', 5,2)->nullable(false)->change();
            $table->decimal('farm_operations', 5,2)->nullable(false)->change();
            $table->decimal('other_activities', 5,2)->nullable(false)->change();
            $table->decimal('total_expenditures', 5,2)->nullable(false)->change();
            $table->decimal('seed_sold', 5,2)->nullable(false)->change();
            $table->decimal('seed_sold_rate', 5,2)->nullable(false)->change();
            $table->decimal('amount_receipt', 5,2)->nullable(false)->change();
            $table->decimal('interest_on_released_fund', 5,2)->nullable(false)->change();
            $table->decimal('total_incomes', 5,2)->nullable(false)->change();
            $table->decimal('opening_balance', 5,2)->nullable(false)->change();  
        });
    }
};
