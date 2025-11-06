<?php

namespace App\Filament\Resources\ContentsMobileFeatures\Pages;

use App\Filament\Resources\ContentsMobileFeatures\ContentsMobileFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContentsMobileFeature extends EditRecord
{
    protected static string $resource = ContentsMobileFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
