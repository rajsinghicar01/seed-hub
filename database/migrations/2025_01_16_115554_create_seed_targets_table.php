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
        Schema::create('seed_targets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('centre_id')->index();
            $table->foreign('centre_id')->references('id')->on('centres')->cascadeOnDelete();

            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();

            $table->unsignedBigInteger('crop_id')->index();
            $table->foreign('crop_id')->references('id')->on('crops')->cascadeOnDelete();

            $table->unsignedBigInteger('variety_id')->index();
            $table->foreign('variety_id')->references('id')->on('varieties')->cascadeOnDelete();

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

            $table->string('total_seed_quantity')->nullable();
       
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_targets');
    }
};
