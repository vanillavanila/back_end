<?php

namespace App\Filament\Resources\AdminContacts\Pages;

use App\Filament\Resources\AdminContacts\AdminContactResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdminContacts extends ListRecords
{
    protected static string $resource = AdminContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
