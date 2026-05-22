<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    #[Override]
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jurusan_id'] ??= auth()->user()->jurusan_id;

        return $data;
    }
}
