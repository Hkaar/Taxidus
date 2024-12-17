<?php

namespace App\Filament\Resources\ObjectTypeResource\Pages;

use App\Filament\Resources\ObjectTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewObjectType extends ViewRecord
{
    protected static string $resource = ObjectTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
