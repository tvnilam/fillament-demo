<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\CurrentMonthUserCount;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\Action;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importUsers')
                ->label('Import Users')
                ->color('danger')
                ->form([
                    FileUpload::make('attachment')->required(),
                ])
                ->action(function (array $data) {
                    $file = public_path('storage/' . $data['attachment']);
                   
                    // // Use Laravel Excel to import the users
                    Excel::import(new UserImport, $file);

                    Notification::make()
                        ->title('user imported')
                        ->send();
                })
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