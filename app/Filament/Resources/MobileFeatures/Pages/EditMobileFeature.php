<?php

namespace App\Filament\Resources\MobileFeatures\Pages;

use App\Filament\Resources\MobileFeatures\MobileFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMobileFeature extends EditRecord
{
    protected static string $resource = MobileFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
