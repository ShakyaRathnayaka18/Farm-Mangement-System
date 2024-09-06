<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvironmentalFactorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('environmental_factors')->insert([
            [
                'location' => 'Kandy,Sri Lanka',
                'soil_moisture' => 40.0,
                'soil_ph_level' => 6.5,
                'temperature' => 27.0, // Example temperature for Rice
                'wind_speed' => 3.0,   // Example wind speed for Rice
                'additional_notes' => 'Needs high humidity.',
            ],
            // Add other crops similarly...
        ]);
    }
}

