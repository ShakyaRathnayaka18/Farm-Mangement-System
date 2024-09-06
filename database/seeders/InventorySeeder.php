<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventory')->insert([
            [
                'item_name' => 'Urea',
                'item_type' => 'Fertilizer',
                'quantity' => 100,
                'expiry_date' => Carbon::now()->addYear(1)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_name' => 'Glyphosate',
                'item_type' => 'Pesticide',
                'quantity' => 50,
                'expiry_date' => Carbon::now()->addMonths(6)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_name' => 'Pumpkin',
                'item_type' => 'Seed',
                'quantity' => 200,
                'expiry_date' => Carbon::now()->addMonths(12)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_name' => 'Tomato',
                'item_type' => 'Seed',
                'quantity' => 150,
                'expiry_date' => Carbon::now()->addMonths(10)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_name' => 'Potassium',
                'item_type' => 'Fertilizer',
                'quantity' => 80,
                'expiry_date' => Carbon::now()->addYear(2)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
