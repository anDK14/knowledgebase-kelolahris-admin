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
            Stat::make('Total Users', User::count())
                ->description('Jumlah pengguna terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Website Modules', WebsiteModule::count())
                ->description('Modul website tersedia')
                ->descriptionIcon('heroicon-m-computer-desktop')
                ->color('primary'),

            Stat::make('Website Features', WebsiteFeature::count())
                ->description('Fitur website tersedia')
                ->descriptionIcon('heroicon-m-cog')
                ->color('info'),

            Stat::make('Mobile Modules', MobileModule::count())
                ->description('Modul mobile tersedia')
                ->descriptionIcon('heroicon-m-device-phone-mobile')
                ->color('warning'),

            Stat::make('Mobile Features', MobileFeature::count())
                ->description('Fitur mobile tersedia')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('danger'),

            Stat::make('FAQ Items', Faq::count())
                ->description('Pertanyaan yang sering diajukan')
                ->descriptionIcon('heroicon-m-question-mark-circle')
                ->color('gray'),
        ];
    }
}