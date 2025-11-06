<?php

namespace App\Filament\Resources\MobileModules;

use App\Filament\Resources\MobileModules\Pages\CreateMobileModule;
use App\Filament\Resources\MobileModules\Pages\EditMobileModule;
use App\Filament\Resources\MobileModules\Pages\ListMobileModules;
use App\Filament\Resources\MobileModules\Schemas\MobileModuleForm;
use App\Filament\Resources\MobileModules\Tables\MobileModulesTable;
use App\Models\MobileModule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MobileModuleResource extends Resource
{
    protected static ?string $model = MobileModule::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-device-phone-mobile';

    protected static ?string $navigationLabel = 'Modul Mobile';
    protected static ?string $modelLabel = 'Modul Mobile';
    protected static ?string $pluralModelLabel = 'Modul Mobile';

    public static function getNavigationGroup(): ?string
    {
        return 'Mobile';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 1;
    }


    public static function form(Schema $schema): Schema
    {
        return MobileModuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MobileModulesTable::configure($table);
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
            'index' => ListMobileModules::route('/'),
            'create' => CreateMobileModule::route('/create'),
            'edit' => EditMobileModule::route('/{record}/edit'),
        ];
    }
}
