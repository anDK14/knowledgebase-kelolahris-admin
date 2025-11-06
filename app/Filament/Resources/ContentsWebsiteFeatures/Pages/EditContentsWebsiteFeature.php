<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures\Pages;

use App\Filament\Resources\ContentsWebsiteFeatures\ContentsWebsiteFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContentsWebsiteFeature extends EditRecord
{
    protected static string $resource = ContentsWebsiteFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
