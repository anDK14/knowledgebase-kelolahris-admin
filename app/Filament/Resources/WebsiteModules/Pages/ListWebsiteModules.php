<?php

namespace App\Filament\Resources\WebsiteModules\Pages;

use App\Filament\Resources\WebsiteModules\WebsiteModuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteModules extends ListRecords
{
    protected static string $resource = WebsiteModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Tambah Modul')
            ->icon('heroicon-o-plus')
            ->button()
            ->color('primary'),
        ];
    }
}
