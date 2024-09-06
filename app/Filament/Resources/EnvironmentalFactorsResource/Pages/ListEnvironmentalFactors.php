<?php

namespace App\Filament\Resources\EnvironmentalFactorsResource\Pages;

use App\Filament\Resources\EnvironmentalFactorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnvironmentalFactors extends ListRecords
{
    protected static string $resource = EnvironmentalFactorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
