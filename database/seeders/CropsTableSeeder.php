<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CropsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('crops')->insert([
            [
                'crop_name' => 'Tomato',
                'crop_type' => 'Vegetable',
                'planting_date' => '2024-01-15',
                'harvest_date' => '2024-03-15',
            ],
            [
                'crop_name' => 'Rice',
                'crop_type' => 'Grain',
                'planting_date' => '2024-03-01',
                'harvest_date' => '2024-06-01',
            ],
            [
                'crop_name' => 'Corn',
                'crop_type' => 'Grain',
                'planting_date' => '2024-05-01',
                'harvest_date' => '2024-08-01',
            ],
            [
                'crop_name' => 'Carrot',
                'crop_type' => 'Vegetable',
                'planting_date' => '2024-02-01',
                'harvest_date' => '2024-04-01',
            ],

        ]);
    }
}
