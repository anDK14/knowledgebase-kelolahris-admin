<?php

namespace App\Filament\Resources\MobileModules\Pages;

use App\Filament\Resources\MobileModules\MobileModuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMobileModules extends ListRecords
{
    protected static string $resource = MobileModuleResource::class;

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
