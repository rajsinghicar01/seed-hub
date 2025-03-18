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
            $table->text('seed_procurement')->after('field_day')->change(); // Change data type to text
            $table->renameColumn('seed_procurement', 'number_of_growers_involved'); // Rename column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revolving_funds', function (Blueprint $table) {
            $table->decimal('seed_procurement', 5,2)->after('field_day')->nullable()->change();
            $table->renameColumn('number_of_growers_involved', 'seed_procurement'); // Rename column back
        });
    }
};
