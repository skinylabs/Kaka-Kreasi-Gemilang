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
        Schema::create('frontend_tour_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('frontend_tours')->onDelete('cascade'); // Relasi ke frontend_tours
            $table->string('path'); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_tour_images');
    }
};
