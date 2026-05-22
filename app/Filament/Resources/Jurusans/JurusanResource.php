<?php

namespace App\Filament\Resources\Jurusans;

use App\Models\Jurusan;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use App\Filament\Resources\Jurusans\Pages\CreateJurusan;
use App\Filament\Resources\Jurusans\Pages\EditJurusan;
use App\Filament\Resources\Jurusans\Pages\ListJurusans;

use App\Filament\Resources\Jurusans\Schemas\JurusanForm;
use App\Filament\Resources\Jurusans\Tables\JurusansTable;

use Illuminate\Database\Eloquent\Builder;

class JurusanResource extends Resource
{
    protected static ?string $model = Jurusan::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Jurusan';

    protected static ?string $modelLabel = 'Jurusan';

    protected static ?string $pluralModelLabel = 'Jurusan';

    public static function form(Schema $schema): Schema
    {
        return JurusanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JurusansTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
    $user = auth()->user();

    if ($user->role === 'super_admin') {
    return parent::getEloquentQuery();
    }

    return parent::getEloquentQuery()
    ->where('id', auth()->user()->jurusan_id);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJurusans::route('/'),
            'create' => CreateJurusan::route('/create'),
            'edit' => EditJurusan::route('/{record}/edit'),
        ];
    }


}