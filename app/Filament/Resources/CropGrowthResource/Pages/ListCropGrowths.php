<?php

namespace App\Filament\Resources\CropGrowthResource\Pages;

use App\Filament\Resources\CropGrowthResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCropGrowths extends ListRecords
{
    protected static string $resource = CropGrowthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
