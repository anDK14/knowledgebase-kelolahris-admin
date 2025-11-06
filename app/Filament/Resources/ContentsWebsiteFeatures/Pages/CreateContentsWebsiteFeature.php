<?php

namespace App\Filament\Resources\ContentsWebsiteFeatures\Pages;

use App\Filament\Resources\ContentsWebsiteFeatures\ContentsWebsiteFeatureResource;
use App\Models\ContentsWebsiteFeature;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateContentsWebsiteFeature extends CreateRecord
{
    protected static string $resource = ContentsWebsiteFeatureResource::class;

    /**
     * Mutasi data sebelum disimpan ke database.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 1️⃣ Ambil nilai content_type dari URL kalau belum ada
        $data['content_type'] = $data['content_type'] ?? request()->query('content_type');

        if (empty($data['content_type'])) {
            $data['content_type'] = 'fitur_utama';

            Notification::make()
                ->title('Content type tidak ditentukan, menggunakan default: Fitur Utama')
                ->warning()
                ->send();
        }

        // 2️⃣ Tentukan urutan otomatis berdasarkan submodule dan content_type
        if (!empty($data['submodule_id']) && !empty($data['content_type'])) {
            $lastOrder = ContentsWebsiteFeature::where('submodule_id', $data['submodule_id'])
                ->where('content_type', $data['content_type'])
                ->max('content_order');

            $data['content_order'] = $lastOrder ? $lastOrder + 1 : 1;
        } else {
            // Jika belum ada submodule_id (belum dipilih)
            $data['content_order'] = 1;
        }

        return $data;
    }
}
