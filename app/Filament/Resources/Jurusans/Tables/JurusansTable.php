<?php

namespace App\Filament\Resources\Jurusans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class JurusansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable(),

                TextColumn::make('deskripsi_profil'),
                
                TextColumn::make('visi'),

                TextColumn::make('misi'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat pada'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}