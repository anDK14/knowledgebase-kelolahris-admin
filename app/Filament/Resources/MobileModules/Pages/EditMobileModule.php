<?php

namespace App\Filament\Resources\MobileModules\Pages;

use App\Filament\Resources\MobileModules\MobileModuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMobileModule extends EditRecord
{
    protected static string $resource = MobileModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
