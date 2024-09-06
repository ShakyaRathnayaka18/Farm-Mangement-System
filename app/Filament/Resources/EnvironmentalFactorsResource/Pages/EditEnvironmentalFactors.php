<?php

namespace App\Filament\Resources\EnvironmentalFactorsResource\Pages;

use App\Filament\Resources\EnvironmentalFactorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnvironmentalFactors extends EditRecord
{
    protected static string $resource = EnvironmentalFactorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
