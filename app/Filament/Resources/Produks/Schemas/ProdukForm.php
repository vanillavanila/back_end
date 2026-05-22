<?php

namespace App\Filament\Resources\Produks\Schemas;

use App\Models\Jurusan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdukForm
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

                TextInput::make('nama_produk')
                    ->required(),

                Textarea::make('deskripsi')
                    ->required(),

                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('produk'),
                
                Select::make('admin_contact_id')
                    ->relationship('adminContact', 'nomor_wa')
                    ->searchable()
                    ->preload()
                    ->required(),    
            ]);
    }
}