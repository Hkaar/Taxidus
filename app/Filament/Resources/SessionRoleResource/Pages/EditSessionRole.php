<?php

namespace App\Filament\Resources\SessionRoleResource\Pages;

use App\Filament\Resources\SessionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSessionRole extends EditRecord
{
    protected static string $resource = SessionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
