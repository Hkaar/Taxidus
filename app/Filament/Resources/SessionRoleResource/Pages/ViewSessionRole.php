<?php

namespace App\Filament\Resources\SessionRoleResource\Pages;

use App\Filament\Resources\SessionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSessionRole extends ViewRecord
{
    protected static string $resource = SessionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
