<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Models\Jurusan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                auth()->user()->role === 'super_admin'

                ? Select::make('jurusan_id')
                    ->label('Jurusan')
                    ->options(Jurusan::pluck('nama', 'id'))
                    ->searchable()
                    ->required()
                
               : Hidden::make('jurusan_id')
                ->default(auth()->user()->jurusan_id),

                TextInput::make('judul_foto')
                    ->required(),

                FileUpload::make('file_foto')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->visibility('public')
                    ->required(),

            ]);
    }
}