<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use Carbon\Carbon;

class CurrentMonthUserCount extends BaseWidget
{
    protected function getCards(): array
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $userCount = User::whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->count();

        $currentDate = Carbon::now()->format('Y-m-d');

        $currentDayUserCount = User::whereDate('created_at', $currentDate)
                        ->count();

        return [
            Card::make('Users registered this month', $userCount),
            Card::make('Users registered today', $currentDayUserCount),
        ];
    }
}