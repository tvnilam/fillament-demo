<?php

namespace App\Filament\Resources\MeetingResource\Pages;

use App\Filament\Resources\MeetingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeeting extends EditRecord
{
    protected static string $resource = MeetingResource::class;
    protected array $userIds = [];

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            
        ];
    }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $this->userIds = $data['user_ids'] ?? [];
    //     unset($data['user_ids']);
        
    //     return $data;
    // }

    // protected function afterSave(): void
    // {
    //     // Retrieve the current meeting record
    //     $meeting = $this->record;
    
    //     // Check if there are selected user IDs from the form input
    
    //     // Sync the user IDs to the pivot table
    //     $meeting->users()->sync($this->userIds);
    // }
    
}
