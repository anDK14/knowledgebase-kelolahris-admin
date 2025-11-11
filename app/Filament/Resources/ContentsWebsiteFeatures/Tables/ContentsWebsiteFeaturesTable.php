<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray')
                    ->size('sm'),

                TextColumn::make('submodule.id')
                    ->label('ID Fitur')
                    ->sortable()
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray')
                    ->size('sm'),

                TextColumn::make('submodule.name')
                    ->label('Nama Fitur')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Tidak ada fitur')
                    ->weight('semibold')
                    ->color('primary')
                    ->size('lg'),

                BadgeColumn::make('content_type')
                    ->label('Tipe Konten')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match($state) {
                            'fitur_utama' => 'Fitur Utama',
                            'panduan_langkah' => 'Panduan Langkah',
                            'contoh_tampilan' => 'Contoh Tampilan',
                            'tip_box' => 'Tip Box',
                            default => $state
                        };
                    })
                    ->colors([
                        'primary' => 'fitur_utama',
                        'secondary' => 'panduan_langkah',
                        'success' => 'contoh_tampilan', 
                        'warning' => 'tip_box',
                    ])
                    ->icons([
                        'heroicon-o-star' => 'fitur_utama',
                        'heroicon-o-document-text' => 'panduan_langkah',
                        'heroicon-o-photo' => 'contoh_tampilan',
                        'heroicon-o-light-bulb' => 'tip_box',
                    ]),

                TextColumn::make('content_order')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter()
                    ->weight('bold')
                    ->color('secondary'),

                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(50)
                    ->searchable()
                    ->weight('medium'),

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

                TextColumn::make('image_path')
                    ->label('Gambar')
                    ->limit(30)
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return $state ?: null;
                    })
                    ->color('gray')
                    ->placeholder('Tidak ada gambar')
                    ->size('sm'),
            ])
            ->filters([
                SelectFilter::make('submodule.name')
                    ->label('Nama Fitur')
                    ->searchable()
                    ->preload()
                    ->relationship('submodule', 'name')
                    ->placeholder('Semua Fitur'),

                SelectFilter::make('content_type')
                    ->label('Tipe Konten')
                    ->options([
                        'fitur_utama' => 'Fitur Utama',
                        'panduan_langkah' => 'Panduan Langkah',
                        'contoh_tampilan' => 'Contoh Tampilan', 
                        'tip_box' => 'Tip Box',
                    ])
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua Tipe'),
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