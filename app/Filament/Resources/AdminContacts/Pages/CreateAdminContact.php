<?php

namespace App\Filament\Resources\AdminContacts\Pages;

use App\Filament\Resources\AdminContacts\AdminContactResource;
use Filament\Resources\Pages\CreateRecord;


class CreateAdminContact extends CreateRecord
{
    protected static string $resource = AdminContactResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jurusan_id'] ??= auth()->user('admin jurusan')->jurusan_id;

        return $data;
    }
}
