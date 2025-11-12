<?php

namespace App\Filament\Resources\ContentsMobileFeatures;

use App\Filament\Resources\ContentsMobileFeatures\Pages\CreateContentsMobileFeature;
use App\Filament\Resources\ContentsMobileFeatures\Pages\EditContentsMobileFeature;
use App\Filament\Resources\ContentsMobileFeatures\Pages\ListContentsMobileFeatures;
use App\Filament\Resources\ContentsMobileFeatures\Schemas\ContentsMobileFeatureForm;
use App\Filament\Resources\ContentsMobileFeatures\Tables\ContentsMobileFeaturesTable;
use App\Models\ContentsMobileFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContentsMobileFeatureResource extends Resource
{
    protected static ?string $model = ContentsMobileFeature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Konten Fitur Mobile';
    protected static ?string $modelLabel = 'Konten Fitur Mobile';
    protected static ?string $pluralModelLabel = 'Konten Fitur Mobile';

    public static function getNavigationGroup(): ?string
    {
        return 'Mobile';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    public static function form(Schema $schema): Schema
    {
        return ContentsMobileFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContentsMobileFeaturesTable::configure($table);
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
            'index' => ListContentsMobileFeatures::route('/'),
            'create' => CreateContentsMobileFeature::route('/create'),
            'edit' => EditContentsMobileFeature::route('/{record}/edit'),
        ];
    }
}
