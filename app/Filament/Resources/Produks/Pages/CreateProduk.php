<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduk extends CreateRecord
{
    protected static string $resource = ProdukResource::class;

    protected function mutateFromDataBeforceCreate(array $data): array
    {
        $data['jurusan_id'] ??= auth()->user()->jurusan_id;

        return $data;
    }

}

