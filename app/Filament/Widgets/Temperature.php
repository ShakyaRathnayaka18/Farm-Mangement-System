<?php

namespace App\Filament\Widgets;

use App\Models\Crop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\EnvironmentalFactors;
use App\Models\Tasks;

class Temperature extends BaseWidget
{
    protected function getStats(): array
    {
        // Get the latest environmental factors record
        $latestEnvironmentalFactors = EnvironmentalFactors::latest()->first();

        // Check if we have a record
        $temperature = $latestEnvironmentalFactors ? $latestEnvironmentalFactors->temperature : null;
        $soilMoisture = $latestEnvironmentalFactors ? $latestEnvironmentalFactors->soil_moisture : null;
        $soilPhLevel = $latestEnvironmentalFactors ? $latestEnvironmentalFactors->soil_ph_level : null;
        $windSpeed = $latestEnvironmentalFactors ? $latestEnvironmentalFactors->wind_speed : null;
        $plantedCropsCount = Crop::count();
        $uncompletedTasksCount = Tasks::where('is_completed', false)->count();

        return [
            Stat::make('Current Temperature', $temperature ? "{$temperature} °C" : 'No data available')
                ->description('Latest recorded temperature')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='" . route('filament.admin.resources.environmental-factors.index') . "';",
                ])
                ->descriptionIcon('icon-temp'),

            Stat::make('Soil Moisture', $soilMoisture ? "{$soilMoisture} %" : 'No data available')
                ->description('Latest recorded soil moisture level')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='" . route('filament.admin.resources.environmental-factors.index') . "';",
                ])
                ->descriptionIcon('icon-moist'),

            Stat::make('Soil pH Level', $soilPhLevel !== null ? "{$soilPhLevel}" : 'No data available')
                ->description('Latest recorded soil pH level')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='" . route('filament.admin.resources.environmental-factors.index') . "';",
                ])
                ->descriptionIcon('icon-pH'),

            Stat::make('Wind Speed', $windSpeed ? "{$windSpeed} m/s" : 'No data available')
                ->description('Latest recorded wind speed')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='" . route('filament.admin.resources.environmental-factors.index') . "';",
                ])
                ->descriptionIcon('icon-wind'),

            Stat::make('Number of Planted Crops', $plantedCropsCount)
            ->description('current Planted Crops')
            ->descriptionIcon('icon-corn'),

            Stat::make('Uncompleted Tasks', $uncompletedTasksCount )
            ->description('Uncompleted Tasks')
            ->descriptionIcon('icon-todo')
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'onclick' => "window.location.href='" . route('filament.admin.resources.tasks.index') . "';", // Use the correct route name
            ]),

        ];
    }
}


