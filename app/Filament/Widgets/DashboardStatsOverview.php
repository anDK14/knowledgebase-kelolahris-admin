<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\WebsiteModule;
use App\Models\WebsiteFeature;
use App\Models\MobileModule;
use App\Models\MobileFeature;
use App\Models\Faq;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Users & FAQ - Primary Colors
            Stat::make('Total Pengguna', User::count())
                ->description('Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary')
                ->url(route('filament.admin.resources.users.index')),

            Stat::make('FAQ', Faq::count())
                ->description('Pertanyaan umum')
                ->descriptionIcon('heroicon-m-chat-bubble-left-ellipsis')
                ->color('primary')
                ->url(route('filament.admin.resources.faqs.index')),

            // Website - Primary Colors
            Stat::make('Modul Website', WebsiteModule::count())
                ->description('Modul tersedia')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('primary')
                ->url(route('filament.admin.resources.website-modules.index')),

            Stat::make('Fitur Website', WebsiteFeature::count())
                ->description('Fitur website')
                ->descriptionIcon('heroicon-m-cog')
                ->color('primary')
                ->url(route('filament.admin.resources.website-features.index')),

            // Mobile - Secondary Colors
            Stat::make('Modul Mobile', MobileModule::count())
                ->description('Modul mobile')
                ->descriptionIcon('heroicon-m-device-phone-mobile')
                ->color('secondary')
                ->url(route('filament.admin.resources.mobile-modules.index')),

            Stat::make('Fitur Mobile', MobileFeature::count())
                ->description('Fitur mobile')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('secondary')
                ->url(route('filament.admin.resources.mobile-features.index')),
        ];
    }

    public function getColumns(): int
    {
        return 3;
    }
}