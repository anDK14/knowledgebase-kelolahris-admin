<?php

namespace App\Filament\Resources\WebsiteModules;

use App\Filament\Resources\WebsiteModules\Pages\CreateWebsiteModule;
use App\Filament\Resources\WebsiteModules\Pages\EditWebsiteModule;
use App\Filament\Resources\WebsiteModules\Pages\ListWebsiteModules;
use App\Filament\Resources\WebsiteModules\Schemas\WebsiteModuleForm;
use App\Filament\Resources\WebsiteModules\Tables\WebsiteModulesTable;
use App\Models\WebsiteModule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebsiteModuleResource extends Resource
{
    protected static ?string $model = WebsiteModule::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Modul Website';
    protected static ?string $modelLabel = 'Modul Website';
    protected static ?string $pluralModelLabel = 'Modul Website';

    public static function getNavigationGroup(): ?string
    {
        return 'Website';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return WebsiteModuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsiteModulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebsiteModules::route('/'),
            'create' => CreateWebsiteModule::route('/create'),
            'edit' => EditWebsiteModule::route('/{record}/edit'),
        ];
    }
}
