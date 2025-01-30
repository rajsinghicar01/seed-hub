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
        Schema::create('seed_target_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('seed_target_id')->index();
            $table->foreign('seed_target_id')->references('id')->on('seed_targets')->cascadeOnDelete();

            $table->unsignedBigInteger('crop_id')->index();
            $table->foreign('crop_id')->references('id')->on('crops')->cascadeOnDelete();

            $table->unsignedBigInteger('variety_id')->index();
            $table->foreign('variety_id')->references('id')->on('varieties')->cascadeOnDelete();

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

            $table->string('total_seed_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_target_items');
    }
};
