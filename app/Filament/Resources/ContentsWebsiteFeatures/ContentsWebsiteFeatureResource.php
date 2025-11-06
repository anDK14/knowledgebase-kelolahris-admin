<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures;

use App\Filament\Resources\ContentsWebsiteFeatures\Pages\CreateContentsWebsiteFeature;
use App\Filament\Resources\ContentsWebsiteFeatures\Pages\EditContentsWebsiteFeature;
use App\Filament\Resources\ContentsWebsiteFeatures\Pages\ListContentsWebsiteFeatures;
use App\Filament\Resources\ContentsWebsiteFeatures\Schemas\ContentsWebsiteFeatureForm;
use App\Filament\Resources\ContentsWebsiteFeatures\Tables\ContentsWebsiteFeaturesTable;
use App\Models\ContentsWebsiteFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContentsWebsiteFeatureResource extends Resource
{
    protected static ?string $model = ContentsWebsiteFeature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Konten Website Feature';
    protected static ?string $modelLabel = 'Konten Website Feature';
    protected static ?string $pluralModelLabel = 'Konten Website Feature';

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
        return ContentsWebsiteFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContentsWebsiteFeaturesTable::configure($table);
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
            'index' => ListContentsWebsiteFeatures::route('/'),
            'create' => CreateContentsWebsiteFeature::route('/create'),
            'edit' => EditContentsWebsiteFeature::route('/{record}/edit'),
        ];
    }
}
