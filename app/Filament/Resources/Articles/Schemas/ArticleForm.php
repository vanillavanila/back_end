<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Jurusan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;


class ArticleForm
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
                ->preload()
                ->required()

                : Hidden::make('jurusan_id')
                ->default(auth()->user()->jurusan_id),

                TextInput::make('title')
                ->required(),
                
                FileUpload::make('thumbnail')
                ->image()
                ->disk('public')
                ->directory('artikel')
                ->preserveFilenames(),


                RichEditor::make('content')->required()->columnSpanFull(),
            ]);
    }
}
