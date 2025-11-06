<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn ($context) => $context === 'create')
                    ->revealable()
                    ->maxLength(255),

                // 🔽 Tambahan: Select Role
                Select::make('roles')
                    ->label('Role')
                    ->multiple() // boleh lebih dari satu role
                    ->relationship('roles', 'name') // relasi dari Spatie
                    ->preload()
                    ->searchable()
                    ->helperText('Pilih peran pengguna (berdasarkan konfigurasi Shield)'),

                TextInput::make('remember_token')
                    ->label('Remember Token')
                    ->disabled()
                    ->dehydrated(false)
                    ->maxLength(100),

                DateTimePicker::make('created_at')
                    ->label('Dibuat Pada')
                    ->disabled()
                    ->dehydrated(false),

                DateTimePicker::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }
}
