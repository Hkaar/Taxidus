<?php

namespace App\Filament\Resources\EntityRoleResource\Pages;

use App\Filament\Resources\EntityRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEntityRole extends ViewRecord
{
    protected static string $resource = EntityRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
