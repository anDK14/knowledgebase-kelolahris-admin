<?php

namespace App\Filament\Resources\MobileFeatures\Pages;

use App\Filament\Resources\MobileFeatures\MobileFeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMobileFeatures extends ListRecords
{
    protected static string $resource = MobileFeatureResource::class;

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
