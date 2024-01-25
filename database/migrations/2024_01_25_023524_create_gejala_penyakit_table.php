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
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->foreignId('gejala_id')->constrained('gejala')->cascadeOnDelete();
            $table->foreignId('penyakit_id')->constrained('penyakit')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala_penyakit');
    }
};
