<?php

namespace App\Filament\Widgets;

use App\Models\EnvironmentalFactors; // Ensure to import your model
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use GuzzleHttp\Client;

class Weather extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';


    protected function getStats(): array
    {
        // Fetch the location from the EnvironmentalFactors model
        $environmentalFactor = EnvironmentalFactors::first(); // Adjust as necessary to get the right record
        // Default to Kandy,SriLanka if no record is found
        $location = $environmentalFactor->location ?? 'Kandy,SriLanka';

        // OpenWeather API endpoint for weather data
        $apiKey = env('OPENWEATHER_API_KEY'); // Get API key from environment variables

        // URL encode the location properly
        $encodedLocation = str_replace(' ', '', $location); // Remove spaces
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($encodedLocation) . "&appid={$apiKey}&units=metric";

        // Create a new HTTP client instance
        $client = new Client();

        // Fetch weather data
        try {
            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody()->getContents(), true); // Decode JSON response

            // Check if the response contains weather data
            if (!isset($data['weather']) || !isset($data['main'])) {
                return [
                    Stat::make('Error', 'Invalid response from API'),
                ];
            }

            // Extract weather data
            $mainWeather = $data['weather'][0]['main'] ?? 'N/A';
            $description = $data['weather'][0]['description'] ?? 'N/A';
            $humidity = $data['main']['humidity'] ?? null;

            // Check if humidity value is present
            if ($humidity === null) {
                return [
                    Stat::make('Error', 'Humidity data not available'),
                ];
            }

            // Return stats array with humidity and weather conditions
            return [
                Stat::make('Weather', "{$mainWeather}") // Display weather conditions
    ->description("{$description}") // Use double quotes to allow variable interpolation
    ->descriptionIcon('icon-weather'),

                Stat::make('Humidity', "{$humidity}%") // Display humidity percentage
                    ->description('Current Humidity')
                    ->descriptionIcon('icon-humid'),
            ];
        } catch (\Exception $e) {
            return [
                Stat::make('Error', $e->getMessage()),
            ];
        }
    }
}
