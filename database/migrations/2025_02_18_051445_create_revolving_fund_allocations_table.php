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
        Schema::create('revolving_fund_allocations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centre_id')->index();
            $table->foreign('centre_id')->references('id')->on('centres')->cascadeOnDelete();
            $table->decimal('total_fund_allocation', 5,2)->default('0.00');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revolving_fund_allocations');
    }
};
