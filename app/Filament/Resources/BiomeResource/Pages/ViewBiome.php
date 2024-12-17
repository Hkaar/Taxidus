<?php

namespace App\Filament\Resources\BiomeResource\Pages;

use App\Filament\Resources\BiomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBiome extends ViewRecord
{
    protected static string $resource = BiomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
