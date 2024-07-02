<?php

namespace App\Filament\Resources\MeetingResource\Pages;

use App\Filament\Resources\MeetingResource;
use Filament\Resources\Pages\Page;
use App\Models\Meeting;

class CalendarPage extends Page
{
    protected static string $resource = MeetingResource::class;

    protected static string $view = 'filament.resources.meeting-resource.pages.calendar-page';

    public function mount()
    {
        $this->meetings = $this->getMeetings();
    }

    public function getMeetings()
    {
        return Meeting::all(['id', 'date', 'time', 'location'])->map(function ($meeting) {
            return [
                'id' => $meeting->id,
                'title' => $meeting->location,
                'start' => $meeting->date . 'T' . $meeting->time,
            ];
        });
    }

    public array $meetings = [];
}
