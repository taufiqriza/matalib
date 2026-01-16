<x-filament-panels::page.simple>
    @php
        $logo = 'logo-matalib.png';
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
    @endphp

    {{-- Custom Styles --}}
    <style>
        .fi-simple-layout {
            background: linear-gradient(135deg, #15803d 0%, #166534 50%, #14532d 100%) !important;
            min-height: 100vh;
        }
        .fi-simple-layout::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }
        .fi-simple-main {
            position: relative;
            z-index: 10;
        }
        .fi-simple-main-ctn {
            width: 100%;
            max-width: 28rem;
        }
        
        /* Custom Card Styling */
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
        }
        
        /* Logo and Branding */
        .login-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }
        .login-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        .login-logo h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #166534;
            margin: 0;
            text-align: center;
        }
        .login-logo p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0.25rem 0 0;
            text-align: center;
        }
        
        /* Arabic Bismillah */
        .bismillah {
            font-family: 'Amiri', serif;
            font-size: 1.25rem;
            color: #166534;
            text-align: center;
            margin-bottom: 0.5rem;
            opacity: 0.8;
        }
        
        /* Form Styling Overrides */
        .fi-fo-field-wrp {
            margin-bottom: 1.25rem;
        }
        .fi-input-wrp {
            background-color: #f9fafb !important;
            border: 2px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
            transition: all 0.3s ease !important;
        }
        .fi-input-wrp:focus-within {
            border-color: #22c55e !important;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1) !important;
            background-color: #fff !important;
        }
        .fi-input {
            padding: 0.875rem 1rem !important;
            font-size: 0.9375rem !important;
        }
        .fi-fo-field-wrp-label {
            font-weight: 600 !important;
            color: #374151 !important;
            margin-bottom: 0.5rem !important;
        }
        
        /* Button Styling */
        .fi-btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%) !important;
            border: none !important;
            border-radius: 0.75rem !important;
            padding: 0.875rem 1.5rem !important;
            font-weight: 700 !important;
            font-size: 0.9375rem !important;
            box-shadow: 0 4px 14px rgba(34, 197, 94, 0.4) !important;
            transition: all 0.3s ease !important;
        }
        .fi-btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.5) !important;
        }
        
        /* Footer */
        .login-footer {
            text-align: center;
            padding-top: 1.5rem;
            margin-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .login-footer a {
            color: #16a34a;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .login-footer a:hover {
            color: #15803d;
        }
        
        /* Decorative Elements */
        .decorative-circle {
            position: fixed;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }
        .circle-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
        }
        .circle-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }
        .circle-3 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            right: 10%;
        }

        /* Hide default Filament header */
        .fi-simple-header {
            display: none !important;
        }
    </style>

    {{-- Decorative Elements --}}
    <div class="decorative-circle circle-1"></div>
    <div class="decorative-circle circle-2"></div>
    <div class="decorative-circle circle-3"></div>

    <div class="login-card relative p-8 sm:p-10">
        {{-- Logo and Branding --}}
        <div class="login-logo">
            <p class="bismillah">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}">
            <h1>{{ $siteName }}</h1>
            <p>{{ $siteTagline }}</p>
        </div>

        {{-- Welcome Text --}}
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Selamat Kembali!</h2>
            <p class="text-gray-500 text-sm">Sila log masuk ke akaun anda</p>
        </div>

        {{-- Login Form --}}
        <x-filament-panels::form wire:submit="authenticate">
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form>

        {{-- Footer --}}
        <div class="login-footer">
            <p class="text-gray-500 text-sm">
                <a href="{{ url('/') }}">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Laman Utama
                </a>
            </p>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="text-center mt-8">
        <p class="text-white/60 text-xs">
            © {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.
        </p>
    </div>

    {{-- Load Amiri Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</x-filament-panels::page.simple>
