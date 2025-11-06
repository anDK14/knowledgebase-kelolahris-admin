<?php

namespace App\Filament\Resources\MobileFeatures;

use App\Filament\Resources\MobileFeatures\Pages\CreateMobileFeature;
use App\Filament\Resources\MobileFeatures\Pages\EditMobileFeature;
use App\Filament\Resources\MobileFeatures\Pages\ListMobileFeatures;
use App\Filament\Resources\MobileFeatures\Schemas\MobileFeatureForm;
use App\Filament\Resources\MobileFeatures\Tables\MobileFeaturesTable;
use App\Models\MobileFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MobileFeatureResource extends Resource
{
    protected static ?string $model = MobileFeature::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Fitur Mobile';
    protected static ?string $modelLabel = 'Fitur Mobile';
    protected static ?string $pluralModelLabel = 'Fitur Mobile';

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
        return MobileFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MobileFeaturesTable::configure($table);
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
            'index' => ListMobileFeatures::route('/'),
            'create' => CreateMobileFeature::route('/create'),
            'edit' => EditMobileFeature::route('/{record}/edit'),
        ];
    }
}
