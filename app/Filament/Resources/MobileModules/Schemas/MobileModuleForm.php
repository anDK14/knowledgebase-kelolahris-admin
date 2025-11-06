<?php

namespace App\Filament\Resources\MobileModules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class MobileModuleForm
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
                    ->label('Nama Modul Mobile')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama modul mobile')
                    ->columnSpan(2),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->required()
                    ->maxLength(500)
                    ->placeholder('Tuliskan deskripsi fitur di sini...')
                    ->columnSpanFull(),
            ]);
    }
}