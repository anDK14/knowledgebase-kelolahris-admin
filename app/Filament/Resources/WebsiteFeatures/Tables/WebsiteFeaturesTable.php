<?php

namespace App\Filament\Resources\WebsiteFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class WebsiteFeaturesTable
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
                    ->color('primary')
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
                        'primary' => fn($state) => $state > 0,
                        'gray' => fn($state) => $state == 0,
                    ])
                    ->icons([
                        'heroicon-o-eye' => fn($state) => $state > 0,
                        'heroicon-o-eye-slash' => fn($state) => $state == 0,
                    ]),

                TextColumn::make('module.name')
                    ->label('Modul')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Tidak ada modul')
                    ->color('primary')
                    ->weight('medium'),

                TextColumn::make('module.id')
                    ->label('ID Modul')
                    ->sortable()
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray'),
            ])
            ->filters([
                SelectFilter::make('module.name')
                    ->label('Filter by Modul')
                    ->relationship('module', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua Modul'),
            ])
            ->recordActions([
                EditAction::make()
                    ->color('primary')
                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->recordUrl(null)
            ->striped()
            ->deferLoading();
    }
}