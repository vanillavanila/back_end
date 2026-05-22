<?php

namespace App\Filament\Resources\Teams\Pages;

use App\Filament\Resources\Teams\TeamResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jurusan_id'] ??= auth()->user()->jurusan_id;

        return $data;
    }
}
