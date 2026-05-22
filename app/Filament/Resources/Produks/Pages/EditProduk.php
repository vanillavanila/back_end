<?php

namespace App\Filament\Resources\Produks\Pages;

use App\Filament\Resources\Produks\ProdukResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduk extends EditRecord
{
    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];

    }
    public static function canEdit($record): bool
    {
    return $record->jurusan_id === auth()->user()->jurusan_id;
    }
}
