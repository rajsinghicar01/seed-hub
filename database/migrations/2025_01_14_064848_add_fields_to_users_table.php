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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->after('email')->nullable();
            $table->unsignedBigInteger('designation_id')->unsigned()->nullable()->after('phone');
            $table->foreign('designation_id')->references('id')->on('designations')->cascadeOnDelete();
            $table->text('address')->after('designation_id')->nullable();
            $table->string('pincode')->nullable()->after('address');
            $table->text('avatar')->after('pincode');
            $table->tinyInteger('status')->default(1)->after('avatar');
            $table->softDeletes()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropForeign(['designation_id']);
            $table->dropColumn('designation_id');
            $table->dropColumn('address');
            $table->dropColumn('pincode');
            $table->dropColumn('avatar');
            $table->dropColumn('status');
        });
    }
};