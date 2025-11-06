<?php

namespace App\Filament\Resources\WebsiteFeatures\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class WebsiteFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID')
                    ->disabled()
                    ->dehydrated(false),

                Select::make('module_id')
                    ->label('Nama Website Module')
                    ->required()
                    ->relationship('module', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih module terkait'),

                TextInput::make('name')
                    ->label('Nama Website Feature')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama fitur website'),

                TextInput::make('view_count')
                    ->label('View Count')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->maxLength(500)
                    ->placeholder('Tuliskan deskripsi fitur di sini...')
                    ->columnSpanFull()
            ])
            ->columns(2);
    }
}