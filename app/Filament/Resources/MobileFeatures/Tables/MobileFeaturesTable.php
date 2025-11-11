<?php

namespace App\Filament\Resources\MobileFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class MobileFeaturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray')
                    ->size('sm'),

                TextColumn::make('name')
                    ->label('Nama Fitur')
                    ->sortable()
                    ->searchable()
                    ->weight('semibold')
                    ->color('secondary')
                    ->size('lg'),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return $state ?: null;
                    })
                    ->color('gray')
                    ->size('sm'),
                
                BadgeColumn::make('view_count')
                    ->label('Dilihat')
                    ->sortable()
                    ->numeric()
                    ->colors([
                        'secondary' => fn($state) => $state > 0,
                        'gray' => fn($state) => $state == 0,
                    ])
                    ->icons([
                        'heroicon-o-eye' => fn($state) => $state > 0,
                        'heroicon-o-eye-slash' => fn($state) => $state == 0,
                    ]),

                TextColumn::make('mobilemodule.name')
                    ->label('Modul')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Tidak ada modul')
                    ->color('secondary')
                    ->weight('medium'),

                TextColumn::make('mobilemodule.id')
                    ->label('ID Modul')
                    ->sortable()
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray'),
            ])
            ->filters([
                SelectFilter::make('mobilemodule.name')
                    ->label('Filter by Modul')
                    ->relationship('mobilemodule', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua Modul'),
            ])
            ->recordActions([
                EditAction::make()
                    ->color('primary'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->color('danger'),
                ]),
            ])
            ->recordUrl(null)
            ->striped()
            ->deferLoading();
    }
}