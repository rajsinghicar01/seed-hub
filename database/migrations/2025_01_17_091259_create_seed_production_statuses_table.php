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
        Schema::create('seed_production_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('quantity_produced');
            $table->string('seed_available_for_sale');
            $table->string('seed_price');
            $table->string('reserved_seed');
            $table->unsignedBigInteger('seed_target_id')->index();
            $table->foreign('seed_target_id')->references('id')->on('seed_targets')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_production_statuses');
    }
};

