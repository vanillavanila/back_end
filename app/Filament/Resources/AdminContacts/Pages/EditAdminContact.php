<?php

namespace App\Filament\Resources\AdminContacts\Pages;

use App\Filament\Resources\AdminContacts\AdminContactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdminContact extends EditRecord
{
    protected static string $resource = AdminContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
