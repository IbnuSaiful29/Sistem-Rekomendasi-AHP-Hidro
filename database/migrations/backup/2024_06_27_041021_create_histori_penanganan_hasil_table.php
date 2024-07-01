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
        Schema::create('histori_penanganan_alternative', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_hasil_penanganan');
            $table->integer('peringkat');
            $table->unsignedBigInteger('id_alternative');
            $table->timestamps();

            $table->foreign('id_hasil_penanganan')->references('id')->on('histori_penanganan')->onDelete('cascade');
            $table->foreign('id_alternative')->references('id')->on('alternatif')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_penanganan_hasil');
    }
};
