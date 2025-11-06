<?php

namespace App\Filament\Resources\WebsiteModules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class WebsiteModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID')
                    ->disabled()
                    ->dehydrated(false)
                    ->columnSpan(1),

                TextInput::make('name')
                    ->label('Nama Website Module')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama modul website')
                    ->columnSpan(2),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->maxLength(500)
                    ->placeholder('Tuliskan deskripsi modul di sini...')
                    ->columnSpanFull(),
            ]);
    }
}