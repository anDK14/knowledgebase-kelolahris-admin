<?php

namespace App\Filament\Resources\MobileFeatures\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class MobileFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID')
                    ->columnSpanFull()
                    ->disabled()
                    ->dehydrated(false),

                Select::make('mobilemodule.name')
                    ->label('Nama Mobile Module')
                    ->required()
                    ->relationship('mobileModule', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih module terkait'),

                TextInput::make('name')
                    ->label('Nama Mobile Feature')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama fitur mobile'),
                    
                TextInput::make('view_count')
                    ->label('View Count')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4)
                    ->maxLength(500)
                    ->placeholder('Tuliskan deskripsi fitur di sini...')
                    ->columnSpanFull()
            ])
            ->columns(2);
    }
}