<?php

namespace App\Filament\Resources\WebsiteFeatures\Pages;

use App\Filament\Resources\WebsiteFeatures\WebsiteFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteFeature extends EditRecord
{
    protected static string $resource = WebsiteFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
