<?php

namespace App\Filament\Widgets;

use App\Models\Meeting;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Filament\Resources\MeetingResources;

class CalendarWidget extends FullCalendarWidget
{
    // protected static string $view = 'filament.widgets.calendar-widget';


    public function fetchEvents(array $fetchInfo): array
    {
        return Meeting::query()
            ->get()
            ->map(
                fn (Meeting $event) => [
                    'title' => $event->id,
                    'start' => $event->date,
                    'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }
}
