<?php

namespace App\Filament\Resources\WebsiteModules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class WebsiteModulesTable
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
                    ->label('Nama Modul')
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

                IconColumn::make('has_features')
                    ->label('Fitur')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->color('secondary')
                    ->tooltip('Memiliki fitur terkait')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('name')
                    ->label('Filter by Modul')
                    ->options(function () {
                        return \App\Models\WebsiteModule::query()
                            ->pluck('name', 'name')
                            ->toArray();
                    })
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