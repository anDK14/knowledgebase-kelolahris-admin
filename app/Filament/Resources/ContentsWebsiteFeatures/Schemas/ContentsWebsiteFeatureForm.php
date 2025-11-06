<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures\Schemas;

use App\Models\ContentsWebsiteFeature;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Actions\Action;

class ContentsWebsiteFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ID (non-editable)
                TextInput::make('id')
                    ->label('ID')
                    ->disabled()
                    ->dehydrated(false),

                // Content Type (fixed & readonly)
                Select::make('content_type')
                    ->label('Content Type')
                    ->options([
                        'fitur_utama'      => 'Fitur Utama',
                        'panduan_langkah'  => 'Panduan Langkah',
                        'contoh_tampilan'  => 'Contoh Tampilan',
                        'tip_box'          => 'Tip Box',
                    ])
                    ->searchable()
                    ->default(fn () => request()->query('content_type'))
                    ->disabled() // selalu nonaktif
                    ->dehydrated(true) // tetap dikirim ke DB
                    ->reactive(),

                // Website Feature Name
                Select::make('submodule_id')
                    ->label('Nama Website Feature')
                    ->required()
                    ->relationship('submodule', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih fitur terkait')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set, $get) {
                        static::updateContentOrder($set, $get);
                    }),

                // Order (auto based on fitur & tipe konten)
                TextInput::make('content_order')
                    ->label('Urutan')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(true)
                    ->default(1)
                    ->hint('Nomor urut otomatis berdasarkan tipe konten & fitur'),

                // Title
                TextInput::make('title')
                    ->label('Judul')
                    ->required(),

                // Image (hanya untuk tipe "contoh_tampilan")
                Textarea::make('image_path')
                    ->label('Image Path')
                    ->required()
                    ->rows(2)
                    ->placeholder('Masukkan dimana gambar di simpan')
                    ->visible(fn ($get) => $get('content_type') === 'contoh_tampilan'),

                // Description (default)
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull()
                    ->placeholder('Masukkan deskripsi konten.')
                    ->visible(fn ($get) => $get('content_type') !== 'panduan_langkah'),

                // Description (khusus panduan langkah)
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(12)
                    ->columnSpanFull()
                    ->placeholder("Masukkan deskripsi konten.\nGunakan tombol Tambah MAIN_STEP dan Tambah SUB_STEP di atas untuk menambahkan format langkah secara otomatis.\nHasilnya seperti:\nMAIN_STEP:  Ketik langkah utama di sini\n    SUB_STEP:  Ketik langkah sub di sini")
                    ->hintActions([
                        Action::make('insertMainStep')
                            ->label('Tambah MAIN_STEP')
                            ->icon('heroicon-o-plus')
                            ->color('primary')
                            ->action(function ($state, $set) {
                                $set('description', trim($state . "\nMAIN_STEP: "));
                            }),

                        Action::make('insertSubStep')
                            ->label('Tambah SUB_STEP')
                            ->icon('heroicon-o-plus')
                            ->color('secondary')
                            ->action(function ($state, $set) {
                                $set('description', trim($state . "\n   SUB_STEP: "));
                            }),
                    ])
                    ->visible(fn ($get) => $get('content_type') === 'panduan_langkah'),
            ])
            ->columns(2);
    }

    /**
     * Hitung urutan konten berdasarkan fitur & tipe konten
     */
    protected static function updateContentOrder($set, $get): void
    {
        $submoduleId = $get('submodule_id');
        $contentType = $get('content_type');

        if (blank($submoduleId) || blank($contentType)) {
            $set('content_order', 1);
            return;
        }

        $lastOrder = ContentsWebsiteFeature::where('submodule_id', $submoduleId)
            ->where('content_type', $contentType)
            ->max('content_order');

        $set('content_order', $lastOrder ? $lastOrder + 1 : 1);
    }
}
