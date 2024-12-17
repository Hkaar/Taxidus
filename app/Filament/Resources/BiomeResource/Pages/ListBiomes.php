<?php

namespace App\Filament\Resources\BiomeResource\Pages;

use App\Filament\Resources\BiomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBiomes extends ListRecords
{
    protected static string $resource = BiomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
