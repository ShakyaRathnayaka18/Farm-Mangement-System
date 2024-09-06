<?php

namespace App\Filament\Resources\CropGrowthResource\Pages;

use App\Filament\Resources\CropGrowthResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCropGrowth extends EditRecord
{
    protected static string $resource = CropGrowthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
