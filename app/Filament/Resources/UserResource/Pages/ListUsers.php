<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\CurrentMonthUserCount;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder; // Add this line

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CurrentMonthUserCount::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Active' => Tab::make()
                ->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('is_active', 1)),
            'Inactive' => Tab::make()
                ->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('is_active', 0)),
        ];
    }
}