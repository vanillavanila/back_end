<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('file_foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(50),
                    

                TextColumn::make('judul_foto')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat'),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}