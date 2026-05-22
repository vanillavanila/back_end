<?php

namespace App\Filament\Resources\AdminContacts;

use App\Filament\Resources\AdminContacts\Pages\CreateAdminContact;
use App\Filament\Resources\AdminContacts\Pages\EditAdminContact;
use App\Filament\Resources\AdminContacts\Pages\ListAdminContacts;
use App\Filament\Resources\AdminContacts\Schemas\AdminContactForm;
use App\Filament\Resources\AdminContacts\Tables\AdminContactsTable;
use App\Models\AdminContact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Override;

class AdminContactResource extends Resource
{
    protected static ?string $model = AdminContact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'AdminContact';

    public static function form(Schema $schema): Schema
    {
        return AdminContactForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminContactsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // 
        ];
    }

    #[Override]
    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if($user->role === 'super_admin'){
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()
        ->where('jurusan_id', $user->jurusan_id);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdminContacts::route('/'),
            'create' => CreateAdminContact::route('/create'),
            'edit' => EditAdminContact::route('/{record}/edit'),
        ];
    }
}
