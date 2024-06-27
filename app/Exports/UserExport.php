<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'name', 'email', 'image', 'is_active', 'type')
                   ->get()
                   ->map(function ($user) {
                       // Convert is_active to a more descriptive string
                       $user->is_active = $user->is_active ? 'Yes' : 'No';
                       return $user;
                   });
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Image',
            'Is Active',
            'Type'
        ];
    }
}
