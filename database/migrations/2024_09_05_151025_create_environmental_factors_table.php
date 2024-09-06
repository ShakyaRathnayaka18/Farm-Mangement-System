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
        Schema::create('environmental_factors', function (Blueprint $table) {
            $table->id();
            $table->text('location');
            $table->decimal('soil_moisture', 5, 2); // Soil moisture level (%)
            $table->decimal('soil_ph_level', 4, 2); // Soil pH level
            $table->decimal('temperature', 5, 2); // Temperature (°C) for the specific crop
            $table->decimal('wind_speed', 5, 2); // Wind speed (m/s) for the specific crop
            $table->text('additional_notes')->nullable(); // Any additional notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environmental_factors');
    }
};
