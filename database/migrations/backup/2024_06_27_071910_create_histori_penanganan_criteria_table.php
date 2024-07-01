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
        Schema::create('histori_penanganan_criteria', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_hasil_penanganan');
            $table->unsignedBigInteger('id_criteria');
            $table->string('value');
            $table->timestamps();

            $table->foreign('id_hasil_penanganan')->references('id')->on('histori_penanganan')->onDelete('cascade');
            $table->foreign('id_criteria')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_penanganan_criteria');
    }
};
