<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CropResource\Pages;
use App\Filament\Resources\CropResource\RelationManagers;
use App\Models\Crop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CropResource extends Resource
{
    protected static ?string $model = Crop::class;

    protected static ?string $navigationIcon = 'icon-crop';

    protected static ?string $navigationGroup = 'Crop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('crop_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('crop_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('planting_date')
                    ->required(),
                Forms\Components\DatePicker::make('harvest_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('crop_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('crop_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('planting_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harvest_date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCrops::route('/'),
            'create' => Pages\CreateCrop::route('/create'),
            'edit' => Pages\EditCrop::route('/{record}/edit'),
        ];
    }
}
