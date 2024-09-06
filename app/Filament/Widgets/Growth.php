<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Crop;
use Illuminate\Support\Facades\Log;

class Growth extends ChartWidget
{
    protected static ?string $heading = 'Crop Growth Stages';

    protected static ?int $sort = 8;

    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 2,
    ];

    protected function getData(): array
{
    // Define growth stages mapping
    $growthStagesMapping = [
        'Seedling' => 1,
        'Vegetative' => 2,
        'Flowering' => 3,
        'Mature' => 4,
        'Harvest' => 5,
    ];

    // Fetch crops and their growth stages
    $crops = Crop::with('growthStages')->get();

    // Prepare the X-axis labels (crop names)
    $labels = $crops->pluck('crop_name')->toArray(); // Use crop names for X-axis labels

    // Prepare datasets for each growth stage
    $datasets = [];

    foreach (array_keys($growthStagesMapping) as $stageName) {
        // Create an array to store the growth stage data for each crop
        $stageData = [];

        foreach ($crops as $crop) {
            // Check if the crop has this stage, otherwise set the data to null to avoid mismatches
            $hasStage = $crop->growthStages->contains('stage_name', $stageName);
            $stageData[] = $hasStage ? $growthStagesMapping[$stageName] : null; // null works better for line charts
        }

        // Add the dataset for each growth stage
        $datasets[] = [
            'label' => $stageName, // Label for the dataset (growth stage)
            'data' => $stageData,  // Data points corresponding to each crop
            'fill' => false,
            'lineTension' => 0, // Prevent connecting the dots
            'borderColor' => '#'.$this->generateRandomColor(), // Random color for each growth stage line
            'borderWidth' => 2, // Optional: Make the line thicker
            'pointRadius' => 5, // Optional: Make the dots larger
        ];
    }

    // Log the chart data for debugging
    Log::info('Chart Data', [
        'labels' => $labels,
        'datasets' => $datasets,
    ]);

    // Map the numeric values to stage names for the Y-axis
    $yAxisLabels = array_keys($growthStagesMapping);

    return [
        'labels' => $labels, // X-axis (crop names)
        'datasets' => $datasets, // Growth stages as datasets
        'yAxis' => [
            'ticks' => [
                'stepSize' => 1, // Set step size to 1 for whole numbers
                'beginAtZero' => true, // Optional: Start from zero if desired
                'min' => 1, // Set the minimum value to 1
                'max' => 5, // Set the maximum value to 5
                'callback' => function($value) use ($yAxisLabels) {
                    return $yAxisLabels[$value - 1]; // Return the corresponding stage name
                },
            ],
            'scaleLabel' => [
                'display' => true,
                'labelString' => 'Growth Stage', // Optional: Set label for Y-axis
            ],
            'gridLines' => [
                'display' => true, // Optional: Show grid lines
            ],
        ],
    ];
}



    protected function getType(): string
    {
        return 'line';
    }

    public function getDescription(): ?string
{
    return 'Click On The Dot See The Growth Stage';
}

    /**
     * Generate random color for dataset lines
     */
    private function generateRandomColor(): string
    {
        return str_pad(dechex(rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
