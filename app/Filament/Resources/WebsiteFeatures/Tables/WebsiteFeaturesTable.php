<?php

namespace App\Filament\Resources\WebsiteFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
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
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('name')
                    ->label('Nama Website Feature')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),

                TextColumn::make('view_count')
                    ->label('View Count')
                    ->sortable()
                    ->searchable()
                    ->numeric(),

                TextColumn::make('module.id')
                    ->label('ID Website Module')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('module.name')
                    ->label('Nama Website Module')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module')
                    ->toggleable(isToggledHiddenByDefault: true),
                    
            ])
            ->filters([
                SelectFilter::make('name')
                ->label('Nama Website Feature')
                ->options(function () {
                    return \App\Models\WebsiteFeature::query()
                    ->pluck('name', 'name')
                    ->toArray();
                })
                ->searchable()
                ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }
}