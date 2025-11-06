<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ContentsWebsiteFeaturesTable
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

                TextColumn::make('submodule.id')
                    ->label('Website Feature ID')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('submodule.name')
                    ->label('Website Feature Name')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module'),

                TextColumn::make('content_type')
                    ->label('Content Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('content_order')
                    ->label('Order')
                    ->sortable()
                    ->alignCenter(),
                
                TextColumn::make('title')
                    ->label('Title')
                    ->limit(50)
                    ->searchable(),
                
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),
                
                TextColumn::make('image_path')
                    ->label('Image')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),
            ])
            ->filters([
                SelectFilter::make('submodule.name')
                    ->label('Website Feature Name')
                    ->searchable()
                    ->preload()
                    ->relationship('submodule', 'name'),

                SelectFilter::make('content_type')
                    ->label('Content Type')
                    ->options([
                        'fitur_utama' => 'Fitur Utama',
                        'panduan_langkah' => 'Panduan Langkah',
                        'contoh_tampilan' => 'Contoh Tampilan',
                        'tip_box' => 'Tip Box',
                    ])
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