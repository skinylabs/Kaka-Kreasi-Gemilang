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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->default('L')->nullable();
            $table->string('group')->nullable();
            $table->string('room_code')->nullable();

            // Foreign keys
            $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade');
            // $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->string('transportation_slug'); // Menggunakan string untuk slug

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
