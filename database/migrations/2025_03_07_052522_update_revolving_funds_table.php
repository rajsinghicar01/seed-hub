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
            $table->string('description')->after('released_fund')->nullable();
            $table->decimal('training_organized', 5,2)->default('0.00')->after('available_infrastructure_fund');

            $table->decimal('field_day', 5,2)->default('0.00')->after('training_organized');
            $table->decimal('seed_procurement', 5,2)->default('0.00')->after('field_day');
            $table->decimal('seed_quantity', 5,2)->default('0.00')->after('seed_procurement');
            $table->decimal('procurement_rate', 5,2)->default('0.00')->after('seed_quantity');
            $table->decimal('farm_operations', 5,2)->default('0.00')->after('procurement_rate');
            $table->decimal('other_activities', 5,2)->default('0.00')->after('farm_operations');
            $table->decimal('total_expenditures', 5,2)->default('0.00')->after('other_activities');

            $table->decimal('seed_sold', 5,2)->default('0.00')->after('total_expenditures');
            $table->decimal('seed_sold_rate', 5,2)->default('0.00')->after('seed_sold');
            $table->decimal('amount_receipt', 5,2)->default('0.00')->after('seed_sold_rate');
            $table->decimal('interest_on_released_fund', 5,2)->default('0.00')->after('amount_receipt');
            $table->decimal('total_incomes', 5,2)->default('0.00')->after('interest_on_released_fund');
            $table->decimal('opening_balance', 5,2)->default('0.00')->after('total_incomes')->comment('released_fund+available_infrastructure_fund+total_incomes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_funds', function (Blueprint $table) {
            Schema::dropIfExists('description');
            Schema::dropIfExists('training_organized');
            Schema::dropIfExists('field_day');
            Schema::dropIfExists('seed_procurement');
            Schema::dropIfExists('seed_quantity');
            Schema::dropIfExists('procurement_rate');
            Schema::dropIfExists('farm_operations');
            Schema::dropIfExists('other_activities');
            Schema::dropIfExists('total_expenditures');
            Schema::dropIfExists('seed_sold');
            Schema::dropIfExists('seed_sold_rate');
            Schema::dropIfExists('amount_receipt');
            Schema::dropIfExists('interest_on_released_fund');
            Schema::dropIfExists('total_incomes');
            Schema::dropIfExists('opening_balance');
        });
    }
};
