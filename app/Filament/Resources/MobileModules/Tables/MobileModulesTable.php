<?php

namespace App\Filament\Resources\MobileModules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class MobileModulesTable
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
                    ->label('Nama Modul Mobile')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),
            ])
            ->filters([
                SelectFilter::make('name')
                ->label('Nama Mobile Module')
                ->options(function () {
                    return \App\Models\MobileModule::query()
                    ->pluck('name', 'name')
                    ->toArray();
                })
                ->searchable()
                ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }
}