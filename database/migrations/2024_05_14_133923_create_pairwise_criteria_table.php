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
        Schema::create('pairwise_criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterion_row_id');
            $table->unsignedBigInteger('criterion_col_id');
            $table->double('value');
            $table->timestamps();

            $table->foreign('criterion_row_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('criterion_col_id')->references('id')->on('kriteria')->onDelete('cascade');

            $table->unique(['criterion_row_id', 'criterion_col_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairwise_criteria');
    }
};
