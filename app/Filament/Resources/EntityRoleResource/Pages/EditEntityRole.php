<?php

namespace App\Filament\Resources\EntityRoleResource\Pages;

use App\Filament\Resources\EntityRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntityRole extends EditRecord
{
    protected static string $resource = EntityRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
