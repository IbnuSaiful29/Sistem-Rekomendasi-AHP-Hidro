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
        Schema::table('alternatif', function (Blueprint $table) {
            $table->string('description')->nullable(); // Add a new nullable string column 'description'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alternatif', function (Blueprint $table) {
            $table->dropColumn('description'); // Drop the 'description' column if it exists
        });
    }
};
