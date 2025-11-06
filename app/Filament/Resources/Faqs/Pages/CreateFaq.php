<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFaq extends CreateRecord
{
    protected static string $resource = FaqResource::class;

    /**
     * Set default form values berdasarkan query parameter feature_type
     */
    protected function getFormDefaults(): array
    {
        $featureType = request()->query('feature_type', 'website');

        return [
            'submodule_id' => $featureType === 'website' ? null : null,
            'mobile_feature_id' => $featureType === 'mobile' ? null : null,
        ];
    }
}
