<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'task_type' => 'Watering',
                'due_date' => Carbon::now()->addDays(1), // Due tomorrow
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_type' => 'Fertilization',
                'due_date' => Carbon::now()->addDays(3), // Due in three days
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_type' => 'Pest Control',
                'due_date' => Carbon::now()->addDays(7), // Due in a week
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_type' => 'Harvesting',
                'due_date' => Carbon::now()->addDays(10), // Due in ten days
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
