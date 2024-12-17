<?php

namespace App\Filament\Resources\BiomeResource\Pages;

use App\Filament\Resources\BiomeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBiome extends EditRecord
{
    protected static string $resource = BiomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
