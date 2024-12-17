<?php

namespace App\Filament\Resources\SessionRoleResource\Pages;

use App\Filament\Resources\SessionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSessionRoles extends ListRecords
{
    protected static string $resource = SessionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
