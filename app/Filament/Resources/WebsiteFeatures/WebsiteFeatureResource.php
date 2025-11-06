<?php

namespace App\Filament\Resources\WebsiteFeatures;

use App\Filament\Resources\WebsiteFeatures\Pages\CreateWebsiteFeature;
use App\Filament\Resources\WebsiteFeatures\Pages\EditWebsiteFeature;
use App\Filament\Resources\WebsiteFeatures\Pages\ListWebsiteFeatures;
use App\Filament\Resources\WebsiteFeatures\Schemas\WebsiteFeatureForm;
use App\Filament\Resources\WebsiteFeatures\Tables\WebsiteFeaturesTable;
use App\Models\WebsiteFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebsiteFeatureResource extends Resource
{
    protected static ?string $model = WebsiteFeature::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?string $navigationLabel = 'Fitur Website';
    protected static ?string $modelLabel = 'Fitur Website';
    protected static ?string $pluralModelLabel = 'Fitur Website';

    public static function getNavigationGroup(): ?string
    {
        return 'Website';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    public static function form(Schema $schema): Schema
    {
        return WebsiteFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsiteFeaturesTable::configure($table);
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
            'index' => ListWebsiteFeatures::route('/'),
            'create' => CreateWebsiteFeature::route('/create'),
            'edit' => EditWebsiteFeature::route('/{record}/edit'),
        ];
    }
}
