<?php

namespace App\Filament\Resources\GameObjectResource\Pages;

use App\Filament\Resources\GameObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGameObject extends ViewRecord
{
    protected static string $resource = GameObjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
