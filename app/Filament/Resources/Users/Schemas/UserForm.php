<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),

                TextInput::make('email')->email()->required(),

                TextInput::make('password')->password()
                ->required()
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),

                Select::make('role')
                ->options([
                    'super_admin' => 'Super Admin',
                    'admin_jurusan' => 'Admin Jurusan',
                ])
                ->required(),

                Select::make('jurusan_id')
                ->relationship('jurusan', 'nama')
                ->searchable()
                ->preload()
                ->required(fn ($get) => $get('role') === 'admin_jurusan'),

            ]);
    }
}
