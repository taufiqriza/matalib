<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Setting;

class Login extends BaseLogin
{
    protected static string $view = 'filament.pages.auth.login';

    public function getTitle(): string|Htmlable
    {
        return 'Log Masuk';
    }

    public function getHeading(): string|Htmlable
    {
        return Setting::get('site_name', 'Matalib');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('E-mel')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->placeholder('nama@email.com')
            ->extraInputAttributes(['class' => 'fi-input-wrp']);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Laluan')
            ->password()
            ->revealable()
            ->required()
            ->placeholder('••••••••')
            ->extraInputAttributes(['class' => 'fi-input-wrp']);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}
