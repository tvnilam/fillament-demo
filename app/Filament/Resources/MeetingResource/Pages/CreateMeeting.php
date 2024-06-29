<?php
namespace App\Filament\Resources\MeetingResource\Pages;

use App\Filament\Resources\MeetingResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\MeetingUser;

class CreateMeeting extends CreateRecord
{
    protected static string $resource = MeetingResource::class;
    protected array $userIds = [];
 
}
