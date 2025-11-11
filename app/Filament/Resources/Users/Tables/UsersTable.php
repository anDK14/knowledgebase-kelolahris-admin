<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class UsersTable
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
                    ->label('Nama')
                    ->sortable()
                    ->searchable()
                    ->weight('semibold')
                    ->color('primary')
                    ->size('lg'),
                
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable()
                    ->color('gray')
                    ->size('sm'),

                BadgeColumn::make('roles.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match($state) {
                            'super_admin' => 'Super Admin',
                            'editor_konten' => 'Editor Konten',
                            'viewer' => 'Viewer',
                            default => $state
                        };
                    })
                    ->colors([
                        'primary' => 'admin',
                        'secondary' => 'user',
                        'success' => 'editor',
                        'warning' => 'moderator',
                    ])
                    ->icons([
                        'heroicon-o-shield-check' => 'admin',
                        'heroicon-o-user' => 'user',
                        'heroicon-o-pencil' => 'editor',
                        'heroicon-o-eye' => 'moderator',
                    ]),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray')
                    ->size('sm'),
                
                TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray')
                    ->size('sm'),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->label('Filter by Role')
                    ->relationship('roles', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua Role'),
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