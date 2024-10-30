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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // Nama link, misalnya 'WhatsApp', 'Instagram'
            $table->string('link');       // URL link, misalnya 'https://wa.me/123456789'
            $table->string('type')->nullable();  // Tipe link, misalnya 'contact', 'social', dll.
            $table->string('description')->nullable(); // Deskripsi opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
