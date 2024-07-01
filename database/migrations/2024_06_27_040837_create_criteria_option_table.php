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
        Schema::create('criteria_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_criteria');
            $table->string('option');
            $table->string('value');
            $table->timestamps();
            $table->foreign('id_criteria')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria_option');
    }
};
