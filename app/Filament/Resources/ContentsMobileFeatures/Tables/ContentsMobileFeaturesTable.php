<?php

namespace App\Filament\Resources\ContentsMobileFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ContentsMobileFeaturesTable
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

                TextColumn::make('mobilefeature.id')
                    ->label('ID Mobile Feature')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('mobilefeature.name')
                    ->label('Nama Mobile Feature')
                    ->sortable()
                    ->searchable()
                    ->placeholder('No Module'),

                TextColumn::make('content_type')
                    ->label('Tipe Konten')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('content_order')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),
                
                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(50)
                    ->searchable(),
                
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),

                TextColumn::make('image_path')
                    ->label('Image Path')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        return $column->getState();
                    }),
            ])
            ->filters([
                // Filter untuk Mobile Feature Name
                SelectFilter::make('mobilefeature.name')
                    ->label('Nama Mobile Feature')
                    ->searchable()
                    ->preload()
                    ->relationship('mobilefeature', 'name'),
                
                // Filter untuk Content Type
                SelectFilter::make('content_type')
                    ->label('Tipe Konten')
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