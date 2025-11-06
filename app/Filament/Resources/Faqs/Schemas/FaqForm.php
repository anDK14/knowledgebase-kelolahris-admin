<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class FaqForm
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

                Select::make('submodule_id')
                    ->label('Website Feature')
                    ->relationship('submodule','name')
                    ->required(fn () => request()->query('feature_type') === 'website')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih website feature')
                    ->disabled(fn () => request()->query('feature_type') === 'mobile'),

                Select::make('mobile_feature_id')
                    ->label('Mobile Feature')
                    ->relationship('mobileFeature', 'name')
                    ->required(fn () => request()->query('feature_type') === 'mobile')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih mobile feature')
                    ->disabled(fn () => request()->query('feature_type') === 'website'),

                Textarea::make('question')
                    ->label('Pertanyaan')
                    ->required()
                    ->rows(2)
                    ->columnSpanFull()
                    ->placeholder('Masukkan pertanyaan yang sering diajukan'),

                Textarea::make('answer')
                    ->label('Jawaban')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull()
                    ->placeholder('Masukkan jawaban untuk pertanyaan di atas'),
            ]);
    }
}
