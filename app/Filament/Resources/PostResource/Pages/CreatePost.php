<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use App\Models\PostAttachment;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    protected array $attachments = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->attachments = $data['attachments'] ?? [];
        unset($data['attachments']);
        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->attachments as $file) {
            $this->record->attachments()->create([
                'name' => $file,
            ]);
        }
    }
}
