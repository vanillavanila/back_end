<?php

namespace App\Filament\Resources\AdminContacts\Schemas;

use App\Models\Jurusan;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdminContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                auth()->user()->role === 'super_admin'

                    ? Select::make('jurusan_id')
                        ->label('Jurusan')
                        ->options(Jurusan::pluck('slug', 'id'))
                        ->searchable()
                        ->preload()
                        ->required()

                    : Hidden::make('jurusan_id')
                        ->default(auth()->user()->jurusan_id),

                TextInput::make('nama')
                    ->required(),

                TextInput::make('nomor_wa')
                    ->required(),

            ]);
    }
}