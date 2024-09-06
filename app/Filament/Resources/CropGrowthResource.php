<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CropGrowthResource\Pages;
use App\Filament\Resources\CropGrowthResource\RelationManagers;
use App\Models\CropGrowth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CropGrowthResource extends Resource
{
    protected static ?string $model = CropGrowth::class;

    protected static ?string $navigationIcon = 'icon-grow';

    protected static ?string $navigationLabel = 'Crop Growth';

    protected static ?string $navigationGroup = 'Crop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('crop_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stage_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('recommendation')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\TextInput::make('observation_type')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('observation_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('crop_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stage_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('observation_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('observation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListCropGrowths::route('/'),
            'create' => Pages\CreateCropGrowth::route('/create'),
            'edit' => Pages\EditCropGrowth::route('/{record}/edit'),
        ];
    }
}
