<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiomeResource\Pages;
use App\Models\Biome;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// use App\Filament\Clusters\Game;

class BiomeResource extends Resource
{
    protected static ?string $model = Biome::class;

    protected static ?string $navigationIcon = 'lucide-box';
    protected static ?string $navigationGroup = 'Resources';

    // protected static ?string $cluster = Game::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBiomes::route('/'),
            'create' => Pages\CreateBiome::route('/create'),
            'view' => Pages\ViewBiome::route('/{record}'),
            'edit' => Pages\EditBiome::route('/{record}/edit'),
        ];
    }
}
