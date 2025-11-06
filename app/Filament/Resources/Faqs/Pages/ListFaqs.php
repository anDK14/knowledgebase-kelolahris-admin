<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\ListRecords;

class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('website_feature')
                    ->label('Website Feature')
                    ->icon('heroicon-o-globe-alt')
                    ->url(fn () => static::getResource()::getUrl('create', [
                        'feature_type' => 'website',
                    ])),

                Action::make('mobile_feature')
                    ->label('Mobile Feature')
                    ->icon('heroicon-o-device-phone-mobile')
                    ->url(fn () => static::getResource()::getUrl('create', [
                        'feature_type' => 'mobile',
                    ])),
            ])
            ->label('Tambah FAQ')
            ->icon('heroicon-o-plus')
            ->button()
            ->color('primary'),
        ];
    }
}
