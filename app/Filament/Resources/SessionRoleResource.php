<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionRoleResource\Pages;
use App\Filament\Resources\SessionRoleResource\RelationManagers;
use App\Models\SessionRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SessionRoleResource extends Resource
{
    protected static ?string $model = SessionRole::class;

    protected static ?string $navigationIcon = 'lucide-key-round';
    protected static ?string $navigationGroup = 'Resources';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSessionRoles::route('/'),
            'create' => Pages\CreateSessionRole::route('/create'),
            'view' => Pages\ViewSessionRole::route('/{record}'),
            'edit' => Pages\EditSessionRole::route('/{record}/edit'),
        ];
    }
}
