<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CropsGrowthStagesAndObservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert growth stages and observations for the crops
        DB::table('crops_growth_stages_and_observations')->insert([
            [
                'crop_id' => 1, // Assuming Tomato is the first entry in crops table
                'stage_name' => 'Mature',
                'recommendation' => 'Ensure consistent moisture.',
                'start_date' => '2024-01-16',
                'end_date' => '2024-01-30',
                'observation_type' => 'Pest',
                'description' => 'No significant pests observed.',
                'observation_date' => '2024-01-20',
            ],
            [
                'crop_id' => 1, // Tomato
                'stage_name' => 'Flowering',
                'recommendation' => 'Increase watering frequency.',
                'start_date' => '2024-02-01',
                'end_date' => '2024-02-15',
                'observation_type' => 'Weather',
                'description' => 'Hot and dry conditions observed.',
                'observation_date' => '2024-02-10',
            ],
            [
                'crop_id' => 2, // Assuming Rice is the second entry in crops table
                'stage_name' => 'Seedling',
                'recommendation' => 'Flood the fields.',
                'start_date' => '2024-03-02',
                'end_date' => '2024-03-15',
                'observation_type' => 'Soil Condition',
                'description' => 'Soil moisture level is good.',
                'observation_date' => '2024-03-05',
            ],
            [
                'crop_id' => 3, // Corn
                'stage_name' => 'Vegetative',
                'recommendation' => 'Apply nitrogen fertilizer.',
                'start_date' => '2024-05-02',
                'end_date' => '2024-06-01',
                'observation_type' => 'Pest',
                'description' => 'Minor pests observed, monitor closely.',
                'observation_date' => '2024-05-10',
            ],
            [
                'crop_id' => 4, // Carrot
                'stage_name' => 'Harvest',
                'recommendation' => 'Harvest when roots are firm.',
                'start_date' => '2024-04-02',
                'end_date' => '2024-04-15',
                'observation_type' => null,
                'description' => null,
                'observation_date' => null,
            ],
            // Add more growth stages and observations as needed
        ]);
    }
}
