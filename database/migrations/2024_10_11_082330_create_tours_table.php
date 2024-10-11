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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('client');
            $table->string('slug')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('security_password');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tata_tertib_id');
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('tata_tertib_id')->references('id')->on('tata_tertibs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
