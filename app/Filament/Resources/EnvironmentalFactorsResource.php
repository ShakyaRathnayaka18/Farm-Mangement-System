<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnvironmentalFactorsResource\Pages;
use App\Filament\Resources\EnvironmentalFactorsResource\RelationManagers;
use App\Filament\Resources\EnvironmentalFactorsResource\Widgets\Temperature;
use App\Models\EnvironmentalFactors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnvironmentalFactorsResource extends Resource
{
    protected static ?string $model = EnvironmentalFactors::class;

    protected static ?string $navigationIcon = 'icon-env';

    protected static ?string $navigationGroup = 'Sensor Data';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('location')
                    ->required(),
                Forms\Components\TextInput::make('soil_moisture')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('soil_ph_level')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('temperature')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('wind_speed')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('additional_notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('soil_moisture')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('soil_ph_level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('temperature')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wind_speed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListEnvironmentalFactors::route('/'),
            'create' => Pages\CreateEnvironmentalFactors::route('/create'),
            'edit' => Pages\EditEnvironmentalFactors::route('/{record}/edit'),
        ];
    }
}
