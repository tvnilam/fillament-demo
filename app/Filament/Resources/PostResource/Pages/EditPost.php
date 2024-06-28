<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use App\Models\PostAttachment;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
    protected array $attachments = [];

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->attachments = $data['attachments'] ?? [];
        unset($data['attachments']);
        return $data;
    }

    protected function afterSave(): void
    {
        foreach ($this->attachments as $file) {
            $this->record->attachments()->create([
                'name' => $file,
            ]);
        }
    }
}
