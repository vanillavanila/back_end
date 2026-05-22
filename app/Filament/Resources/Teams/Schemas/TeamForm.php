<?php

namespace App\Filament\Resources\Teams\Schemas;

use App\Models\Jurusan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jurusan_id')
                ->label('Nama Jurusan')
                ->options(Jurusan::pluck('nama', 'id'))
                ->searchable()
                ->required(),

                TextInput::make('nama')->required(),

                TextInput::make('jabatan')->required(),

                FileUpload::make('foto')
                ->image()->disk('public')
                ->directory('team')
                ->visibility('public')
                ->required(),

            ]);
    }
}
