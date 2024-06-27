<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel
{
    use \Maatwebsite\Excel\Concerns\Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return User::updateOrCreate(
            ['email' => $row[1]], // Check if user with this email exists
            [
                'name'     => $row[0],
                'password' => Hash::make($row[2]),
                'is_active' => 1
            ]
        );
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Start importing from the second row (index 2)
    }
}