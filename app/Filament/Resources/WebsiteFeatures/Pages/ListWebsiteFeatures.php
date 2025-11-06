<?php

namespace App\Filament\Resources\WebsiteFeatures\Pages;

use App\Filament\Resources\WebsiteFeatures\WebsiteFeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteFeatures extends ListRecords
{
    protected static string $resource = WebsiteFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Tambah Fitur')
            ->icon('heroicon-o-plus')
            ->button()
            ->color('primary'),
        ];
    }
}
