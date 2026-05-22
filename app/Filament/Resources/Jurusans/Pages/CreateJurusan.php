<?php

namespace App\Filament\Resources\Jurusans\Pages;

use App\Filament\Resources\Jurusans\JurusanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJurusan extends CreateRecord
{
    protected static string $resource = JurusanResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
    $data['jurusan_id'] ??= auth()->user()->jurusan_id;

    return $data;
    }
}
