<?php

namespace App\Filament\Resources\WebsiteModules\Pages;

use App\Filament\Resources\WebsiteModules\WebsiteModuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteModule extends EditRecord
{
    protected static string $resource = WebsiteModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
