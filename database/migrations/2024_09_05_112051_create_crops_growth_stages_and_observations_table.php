<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crops_growth_stages_and_observations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crop_id')->constrained('crops')->onDelete('cascade'); // Foreign key to crops table

            // Growth stage details
            $table->string('stage_name'); // Stage name (e.g., Germination, Flowering, Harvest)
            $table->text('recommendation')->nullable(); // Recommendations for the crop stage (e.g., watering, fertilization)
            $table->date('start_date'); // Start date of the stage
            $table->date('end_date')->nullable(); // End date of the stage

            // Observations details
            $table->string('observation_type')->nullable(); // Type of observation (e.g., Pest, Weather, Soil Condition)
            $table->text('description')->nullable(); // Description of the observation
            $table->date('observation_date')->nullable(); // Date the observation was logged

            $table->timestamps();
        });

        DB::statement('
        DELIMITER //
        CREATE TRIGGER inventory_status_update
        BEFORE UPDATE ON inventory
        FOR EACH ROW
        BEGIN
            SET NEW.inventory_status = CASE
                WHEN NEW.quantity <= 10 THEN "Low Stock"
                ELSE "In Stock"
            END;
        END //
        DELIMITER ;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops_growth_stages_and_observations');
    }
};
