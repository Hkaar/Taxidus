<?php

namespace App\Filament\Resources\EntityRoleResource\Pages;

use App\Filament\Resources\EntityRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntityRoles extends ListRecords
{
    protected static string $resource = EntityRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
