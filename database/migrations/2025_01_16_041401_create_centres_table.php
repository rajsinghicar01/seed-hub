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
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('centre_name')->unique();
            $table->text('centre_address');
            $table->unsignedBigInteger('zone_id')->index();
            $table->foreign('zone_id')->references('id')->on('zones')->cascadeOnDelete();
            $table->unsignedBigInteger('state_id')->index();
            $table->foreign('state_id')->references('id')->on('states')->cascadeOnDelete();
            $table->string('pincode');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('controlling_authority_id')->index();
            $table->foreign('controlling_authority_id')->references('id')->on('controlling_authorities')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centres');
    }
};
