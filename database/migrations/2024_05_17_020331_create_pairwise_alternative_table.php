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
        Schema::create('pairwise_alternative', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('alternative_id');
            $table->decimal('value'); // Presisi 18 digit total dan 15 digit setelah koma
            $table->timestamps();

            $table->foreign('criteria_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('alternative_id')->references('id')->on('alternatif')->onDelete('cascade');

            $table->unique(['criteria_id', 'alternative_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairwise_alternative');
    }
};
