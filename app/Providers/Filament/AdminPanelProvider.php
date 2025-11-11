<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarFullyCollapsibleOnDesktop()
            ->id('admin')
            ->path('admin')
            ->login()
            ->font('Poppins')
            ->darkMode(false)
            ->brandLogo('https://www.kelolahr.id/wp-content/uploads/2023/09/new-logo-khr.png')
            ->brandLogoHeight('2rem')
            ->colors([
                'primary' => [
                    50  => '#E6F2F1',
                    100 => '#CCE5E3',
                    200 => '#99CBC7',
                    300 => '#66B1AB',
                    400 => '#33978F',
                    500 => '#045257', // utama
                    600 => '#034A4E',
                    700 => '#024245',
                    800 => '#02393C',
                    900 => '#013133',
                ],
                'secondary' => [
                    50  => '#FFF3E6',
                    100 => '#FFE7CC',
                    200 => '#FFCF99',
                    300 => '#FFB766',
                    400 => '#FF9F33',
                    500 => '#FC9E49', // utama
                    600 => '#E68F42',
                    700 => '#CC7E3A',
                    800 => '#B36E33',
                    900 => '#995E2B',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->resourceCreatePageRedirect('index')
            ->resourceEditPageRedirect('index')
            ->authMiddleware([
                Authenticate::class,
            ])
            ->globalSearch(false)
            ->plugins([
                FilamentShieldPlugin::make()
                    ->navigationLabel('Role')
                    ->navigationIcon('heroicon-o-shield-check')
                    ->activeNavigationIcon('heroicon-s-shield-check')
                    ->navigationGroup('Lainnya')
                    ->navigationSort(3)
                    ->navigationBadge(fn() => Role::count())
                    ->navigationBadgeColor('info')
                    ->registerNavigation(true)

                    ->modelLabel('Role')
                    ->pluralModelLabel('Daftar Role')
                    ->recordTitleAttribute('name')
                    ->titleCaseModelLabel(false),
            ]);
    }
}
