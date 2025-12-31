<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['group' => 'general', 'key' => 'site_name', 'value' => 'Matalib', 'type' => 'text', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_tagline', 'value' => 'Madrasah Tahfiz Al Qur\'an Ibnu Talib', 'type' => 'text', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_description', 'value' => 'Matalib adalah platform digital untuk Madrasah Tahfiz Al Qur\'an Ibnu Talib yang menyediakan pengurusan kandungan dan maklumat madrasah.', 'type' => 'textarea', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_email', 'value' => 'info@matalib.my', 'type' => 'text', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_phone', 'value' => '', 'type' => 'text', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_address', 'value' => '', 'type' => 'textarea', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_logo', 'value' => '', 'type' => 'image', 'is_public' => true],
            ['group' => 'general', 'key' => 'site_favicon', 'value' => '', 'type' => 'image', 'is_public' => true],
            
            // Social
            ['group' => 'social', 'key' => 'social_facebook', 'value' => '', 'type' => 'text', 'is_public' => true],
            ['group' => 'social', 'key' => 'social_instagram', 'value' => '', 'type' => 'text', 'is_public' => true],
            ['group' => 'social', 'key' => 'social_youtube', 'value' => '', 'type' => 'text', 'is_public' => true],
            ['group' => 'social', 'key' => 'social_whatsapp', 'value' => '', 'type' => 'text', 'is_public' => true],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
