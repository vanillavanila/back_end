<?php

namespace App\Filament\Resources\Jurusans\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str; // Import ini untuk membuat slug

class JurusanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->live(onBlur: true) // Aktifkan mode live saat kursor pindah
                    ->afterStateUpdated(fn (string $operation, $state, Schema $schema) => 
                        $operation === 'create' ? $schema->state(['slug' => Str::slug($state)]) : null
                    ),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Otomatis terisi dari nama jurusan'),

                Textarea::make('deskripsi_profil')
                    ->rows(3),

                Textarea::make('visi')
                    ->rows(2),

                Textarea::make('misi')
                    ->rows(3)
                    ->helperText('Gunakan baris baru untuk setiap poin misi'),
            ]);
    }
}