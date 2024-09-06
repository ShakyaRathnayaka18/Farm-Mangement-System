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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('crop_name'); // Crop name (e.g., Tomato)
            $table->string('crop_type'); // Crop type (e.g., Vegetable, Grain)
            $table->date('planting_date'); // Date of planting
            $table->date('harvest_date')->nullable(); // Est
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
