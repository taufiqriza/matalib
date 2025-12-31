<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;

class AppSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'App Settings';

    protected static ?string $title = 'Pengaturan Aplikasi';

    protected static string $view = 'filament.pages.app-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'site_name' => Setting::get('site_name', 'Matalib'),
            'site_tagline' => Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib'),
            'site_description' => Setting::get('site_description', ''),
            'site_logo' => Setting::get('site_logo'),
            'site_favicon' => Setting::get('site_favicon'),
            'site_email' => Setting::get('site_email'),
            'site_phone' => Setting::get('site_phone'),
            'site_address' => Setting::get('site_address'),
            'social_facebook' => Setting::get('social_facebook'),
            'social_instagram' => Setting::get('social_instagram'),
            'social_youtube' => Setting::get('social_youtube'),
            'social_whatsapp' => Setting::get('social_whatsapp'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Informasi Umum')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Forms\Components\Section::make('Identitas Aplikasi')
                                    ->description('Pengaturan nama dan deskripsi aplikasi')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_name')
                                            ->label('Nama Aplikasi')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('Matalib'),

                                        Forms\Components\TextInput::make('site_tagline')
                                            ->label('Tagline')
                                            ->maxLength(255)
                                            ->placeholder('Madrasah Tahfiz Al Qur\'an Ibnu Talib'),

                                        Forms\Components\Textarea::make('site_description')
                                            ->label('Deskripsi')
                                            ->rows(3)
                                            ->placeholder('Deskripsi singkat tentang aplikasi'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Logo & Favicon')
                                    ->description('Upload logo dan favicon aplikasi')
                                    ->schema([
                                        Forms\Components\FileUpload::make('site_logo')
                                            ->label('Logo')
                                            ->image()
                                            ->directory('branding')
                                            ->imagePreviewHeight('100')
                                            ->helperText('Disarankan: 200x50px, format PNG'),

                                        Forms\Components\FileUpload::make('site_favicon')
                                            ->label('Favicon')
                                            ->image()
                                            ->directory('branding')
                                            ->imagePreviewHeight('50')
                                            ->helperText('Disarankan: 32x32px atau 64x64px, format ICO/PNG'),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Kontak')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Forms\Components\Section::make('Informasi Kontak')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_email')
                                            ->label('Email')
                                            ->email()
                                            ->placeholder('info@matalib.my'),

                                        Forms\Components\TextInput::make('site_phone')
                                            ->label('No. Telefon')
                                            ->tel()
                                            ->placeholder('+60123456789'),

                                        Forms\Components\Textarea::make('site_address')
                                            ->label('Alamat')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Media Sosial')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\Section::make('Pautan Media Sosial')
                                    ->schema([
                                        Forms\Components\TextInput::make('social_facebook')
                                            ->label('Facebook')
                                            ->url()
                                            ->prefix('https://')
                                            ->placeholder('facebook.com/matalib'),

                                        Forms\Components\TextInput::make('social_instagram')
                                            ->label('Instagram')
                                            ->url()
                                            ->prefix('https://')
                                            ->placeholder('instagram.com/matalib'),

                                        Forms\Components\TextInput::make('social_youtube')
                                            ->label('YouTube')
                                            ->url()
                                            ->prefix('https://')
                                            ->placeholder('youtube.com/@matalib'),

                                        Forms\Components\TextInput::make('social_whatsapp')
                                            ->label('WhatsApp')
                                            ->placeholder('+60123456789'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            $group = str_starts_with($key, 'social_') ? 'social' : 'general';
            $type = in_array($key, ['site_logo', 'site_favicon']) ? 'image' : 'text';
            
            Setting::set($key, $value, $type, $group);
        }

        // Clear all setting caches
        Cache::flush();

        Notification::make()
            ->title('Tetapan Berjaya Disimpan!')
            ->success()
            ->send();
    }
}
