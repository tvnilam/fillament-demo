<?php
namespace App\Filament\Resources\MeetingResource\Pages;

use App\Filament\Resources\MeetingResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\MeetingUser;

class CreateMeeting extends CreateRecord
{
    protected static string $resource = MeetingResource::class;
    protected array $userIds = [];

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $this->userIds = $data['user_ids'] ?? [];
    //     unset($data['user_ids']);
        
    //     return $data;
    // }

    // protected function afterCreate(): void
    // {
    //     foreach ($this->userIds as $userId) {
    //         $meetingUser = new MeetingUser();
    //         $meetingUser->user_id = $userId;
    //         $meetingUser->meeting_id = $this->record->id;
    //         $meetingUser->save();
    //     }
        
    //     // $this->record->users()->sync($this->userIds);
    // }
}
