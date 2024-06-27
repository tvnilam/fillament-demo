<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Filament\Forms\Components\TextInput;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;

class CustomRegister extends BaseRegister
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Name')
                ->required(),
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required()
        ];
    }

    public function register(): ?RegistrationResponse
    {
        $data = $this->form->getState();
            
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        auth()->login($user);

        return app(RegistrationResponse::class);
    }
}
