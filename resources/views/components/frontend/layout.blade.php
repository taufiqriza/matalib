<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>{{ $title ?? 'Laman Utama' }} - {{ \App\Models\Setting::get('site_name', 'Matalib') }}</title>
    
    {{-- Favicon & Settings --}}
    @php
        $favicon = \App\Models\Setting::get('site_favicon');
        $logo = 'logo-matalib.png';
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
        $phone = \App\Models\Setting::get('site_phone', '+60 19-227 6874');
        $email = \App\Models\Setting::get('site_email');
        $address = \App\Models\Setting::get('site_address', 'Km16, Jalan Nekmat, Kampung Pulai, 77300 Merlimau, Melaka');
        $facebook = \App\Models\Setting::get('social_facebook');
        $instagram = \App\Models\Setting::get('social_instagram');
        $youtube = \App\Models\Setting::get('social_youtube');
        $whatsapp = \App\Models\Setting::get('social_whatsapp');
    @endphp
    @if($favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $favicon) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif
    
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <style>
        html, body { margin: 0; padding: 0; background: #f0fdf4; }
        body { opacity: 0; }
        body.ready { opacity: 1; transition: opacity 0.15s; }
    </style>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 
                            50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 300: '#86efac', 
                            400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d', 
                            800: '#166534', 900: '#14532d', 950: '#052e16'
                        },
                        accent: { 400: '#fbbf24', 500: '#f59e0b', 600: '#d97706' }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
                        'arabic': ['Amiri', 'serif']
                    }
                }
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('ready');
        });
    </script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .pattern-bg {
            background-color: #f0fdf4;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2322c55e' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-gradient {
            background: linear-gradient(135deg, #15803d 0%, #166534 50%, #14532d 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .arabic-text {
            font-family: 'Amiri', serif;
            direction: rtl;
        }
        [x-cloak] { display: none !important; }
        
        /* Mobile Bottom Padding */
        .main-content {
            padding-bottom: 5rem;
        }
        @media (min-width: 1024px) {
            .main-content {
                padding-bottom: 0;
            }
        }
        
        /* Safe area for iOS */
        .safe-area-bottom {
            padding-bottom: env(safe-area-inset-bottom);
        }
        

        
        /* Floating WhatsApp */
        .whatsapp-float {
            position: fixed;
            bottom: 5.5rem;
            right: 0.75rem;
            z-index: 9999;
        }
        @media (min-width: 1024px) {
            .whatsapp-float {
                bottom: 1.5rem;
                right: 1.5rem;
            }
        }
        .whatsapp-button {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        .whatsapp-button:hover {
            transform: scale(1.1);
        }
        .whatsapp-button i {
            font-size: 24px;
            color: white;
        }
        .whatsapp-popup {
            position: absolute;
            bottom: 58px;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            width: 280px;
            overflow: hidden;
            transform-origin: bottom right;
        }
        @media (max-width: 360px) {
            .whatsapp-popup {
                width: calc(100vw - 1.5rem);
                right: -0.375rem;
            }
        }
        .whatsapp-popup-header {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            padding: 10px 14px;
            color: white;
        }
        .whatsapp-contact {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s;
            text-decoration: none;
            color: inherit;
        }
        .whatsapp-contact:hover {
            background: #f8f9fa;
        }
        .whatsapp-contact:last-child {
            border-bottom: none;
        }
        .whatsapp-contact-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }
        .whatsapp-contact-info h4 {
            font-weight: 600;
            font-size: 11px;
            color: #1a1a1a;
            margin: 0 0 1px 0;
        }
        .whatsapp-contact-info p {
            font-size: 10px;
            color: #666;
            margin: 0;
        }
        .pulse-ring {
            position: absolute;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.3);
            animation: pulse-ring 2s ease-out infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        
        /* Slide Menu Overlay */
        .slide-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 60;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }
        .slide-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .slide-menu {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-radius: 1.5rem 1.5rem 0 0;
            z-index: 70;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            max-height: 70vh;
            overflow-y: auto;
            padding-bottom: env(safe-area-inset-bottom);
        }
        .slide-menu.active {
            transform: translateY(0);
        }
        .slide-menu-handle {
            width: 2.5rem;
            height: 0.25rem;
            background: #d1d5db;
            border-radius: 0.125rem;
            margin: 0.75rem auto;
        }
        
        /* Safe area */
        @supports (padding: env(safe-area-inset-bottom)) {
            .main-content {
                padding-bottom: calc(4.5rem + env(safe-area-inset-bottom));
            }
            @media (min-width: 1024px) {
                .main-content {
                    padding-bottom: 0;
                }
            }
        }
    </style>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="pattern-bg min-h-screen" x-data="{ slideMenuOpen: false }">

    {{-- Top Bar - Desktop Only --}}
    <div class="bg-primary-900 text-white text-xs hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center gap-6">
                @if($address)
                <span class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-primary-400"></i> {{ Str::limit($address, 50) }}
                </span>
                @endif
                @if($phone)
                <a href="tel:{{ $phone }}" class="flex items-center gap-2 hover:text-primary-200 transition">
                    <i class="fas fa-phone text-primary-400"></i> {{ $phone }}
                </a>
                @endif
                @if($email)
                <a href="mailto:{{ $email }}" class="flex items-center gap-2 hover:text-primary-200 transition">
                    <i class="fas fa-envelope text-primary-400"></i> {{ $email }}
                </a>
                @endif
            </div>
            <div class="flex items-center gap-4">
                <span class="text-primary-300 text-xs">Ikuti Kami:</span>
                @if($facebook)<a href="{{ $facebook }}" target="_blank" class="w-6 h-6 bg-white/10 hover:bg-blue-600 rounded-full flex items-center justify-center transition"><i class="fab fa-facebook-f text-xs"></i></a>@endif
                @if($instagram)<a href="{{ $instagram }}" target="_blank" class="w-6 h-6 bg-white/10 hover:bg-pink-600 rounded-full flex items-center justify-center transition"><i class="fab fa-instagram text-xs"></i></a>@endif
                @if($youtube)<a href="{{ $youtube }}" target="_blank" class="w-6 h-6 bg-white/10 hover:bg-red-600 rounded-full flex items-center justify-center transition"><i class="fab fa-youtube text-xs"></i></a>@endif
                @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-6 h-6 bg-white/10 hover:bg-green-500 rounded-full flex items-center justify-center transition"><i class="fab fa-whatsapp text-xs"></i></a>@endif
            </div>
        </div>
    </div>

    {{-- Main Header --}}
    <header class="hero-gradient sticky top-0 z-40 shadow-lg">
        <div class="max-w-7xl mx-auto px-3 lg:px-4">
            {{-- Mobile Header - Centered --}}
            <div class="flex lg:hidden items-center justify-center h-12">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-7 w-auto">
                    <div>
                        <h1 class="text-white font-bold text-xs leading-tight">{{ $siteName }}</h1>
                        <p class="text-primary-200 text-[8px] leading-tight">{{ $siteTagline }}</p>
                    </div>
                </a>
            </div>
            
            {{-- Desktop Header --}}
            <div class="hidden lg:flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-12 w-auto">
                    <div>
                        <h1 class="text-white font-bold text-xl leading-tight">{{ $siteName }}</h1>
                        <p class="text-primary-200 text-sm leading-tight">{{ $siteTagline }}</p>
                    </div>
                </a>

                <nav class="flex items-center gap-1">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->is('/') ? 'bg-white/15' : '' }}">
                        <i class="fas fa-home text-xs"></i> Laman Utama
                    </a>
                    <a href="{{ url('/berita') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->is('berita*') ? 'bg-white/15' : '' }}">
                        <i class="fas fa-newspaper text-xs"></i> Berita
                    </a>
                    <a href="{{ url('/galeri') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->is('galeri*') ? 'bg-white/15' : '' }}">
                        <i class="fas fa-images text-xs"></i> Galeri
                    </a>
                    <a href="{{ url('/tentang') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->is('tentang') ? 'bg-white/15' : '' }}">
                        <i class="fas fa-info-circle text-xs"></i> Tentang Kami
                    </a>
                    <a href="{{ url('/kontak') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->is('kontak') ? 'bg-white/15' : '' }}">
                        <i class="fas fa-envelope text-xs"></i> Hubungi
                    </a>
                </nav>

                <a href="{{ url('/admin') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-primary-700 bg-white hover:bg-gray-50 rounded-xl shadow-sm transition">
                    <i class="fas fa-sign-in-alt"></i> Log Masuk
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="main-content lg:pb-0">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-primary-900 text-white mt-6 lg:mt-16 pb-24 lg:pb-0">
        {{-- Mobile Footer - Compact --}}
        <div class="lg:hidden px-4 py-4">
            <div class="text-center mb-3">
                <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-8 w-auto mx-auto mb-2">
                <h3 class="font-bold text-xs">{{ $siteName }}</h3>
                <p class="text-primary-300 text-[9px]">{{ $siteTagline }}</p>
            </div>
            <div class="flex justify-center gap-2 mb-3">
                @if($facebook)<a href="{{ $facebook }}" target="_blank" class="w-7 h-7 bg-white/10 hover:bg-blue-600 rounded-lg flex items-center justify-center transition text-xs"><i class="fab fa-facebook-f"></i></a>@endif
                @if($instagram)<a href="{{ $instagram }}" target="_blank" class="w-7 h-7 bg-white/10 hover:bg-pink-600 rounded-lg flex items-center justify-center transition text-xs"><i class="fab fa-instagram"></i></a>@endif
                @if($youtube)<a href="{{ $youtube }}" target="_blank" class="w-7 h-7 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition text-xs"><i class="fab fa-youtube"></i></a>@endif
                @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-7 h-7 bg-white/10 hover:bg-green-600 rounded-lg flex items-center justify-center transition text-xs"><i class="fab fa-whatsapp"></i></a>@endif
            </div>
            <p class="text-primary-400 text-[8px] text-center">{{ $address }}</p>
            <div class="border-t border-primary-800 mt-3 pt-3 text-center">
                <p class="text-primary-400 text-[8px]">© {{ date('Y') }} {{ $siteName }}</p>
            </div>
        </div>
        
        {{-- Desktop Footer --}}
        <div class="hidden lg:block max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-12 w-auto">
                        <div>
                            <h3 class="font-bold text-lg">{{ $siteName }}</h3>
                            <p class="text-primary-300 text-sm">{{ $siteTagline }}</p>
                        </div>
                    </div>
                    <p class="text-primary-300 text-sm leading-relaxed mb-4">
                        {{ \App\Models\Setting::get('site_description', 'Platform digital rasmi untuk Madrasah Tahfiz Al Qur\'an Ibnu Talib.') }}
                    </p>
                    <div class="flex gap-3">
                        @if($facebook)<a href="{{ $facebook }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-blue-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-facebook-f"></i></a>@endif
                        @if($instagram)<a href="{{ $instagram }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-pink-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-instagram"></i></a>@endif
                        @if($youtube)<a href="{{ $youtube }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-red-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-youtube"></i></a>@endif
                        @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-green-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-whatsapp"></i></a>@endif
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-primary-300 hover:text-white transition text-sm">Laman Utama</a></li>
                        <li><a href="{{ url('/berita') }}" class="text-primary-300 hover:text-white transition text-sm">Berita</a></li>
                        <li><a href="{{ url('/galeri') }}" class="text-primary-300 hover:text-white transition text-sm">Galeri</a></li>
                        <li><a href="{{ url('/tentang') }}" class="text-primary-300 hover:text-white transition text-sm">Tentang Kami</a></li>
                        <li><a href="{{ url('/kontak') }}" class="text-primary-300 hover:text-white transition text-sm">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Hubungi</h4>
                    <ul class="space-y-3">
                        @if($phone)
                        <li class="flex items-start gap-2">
                            <i class="fas fa-phone text-primary-400 mt-0.5 text-sm"></i>
                            <span class="text-primary-300 text-sm">{{ $phone }}</span>
                        </li>
                        @endif
                        @if($address)
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt text-primary-400 mt-0.5 text-sm"></i>
                            <span class="text-primary-300 text-sm">{{ $address }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="border-t border-primary-800 mt-8 pt-8 text-center">
                <p class="text-primary-400 text-sm">© {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.</p>
            </div>
        </div>
    </footer>

    {{-- Mobile Bottom Navigation - Perpustakaan Style --}}
    <div class="fixed bottom-0 left-0 right-0 bg-gradient-to-r from-primary-800 to-primary-900 lg:hidden z-50 safe-area-bottom shadow-[0_-4px_20px_rgba(0,0,0,0.25)]">
        <div class="flex items-center justify-around py-2">
            <a href="{{ url('/') }}" class="flex flex-col items-center py-1.5 px-3 {{ request()->is('/') ? 'text-white' : 'text-primary-300' }} hover:text-white transition">
                <span class="w-10 h-10 rounded-xl flex items-center justify-center {{ request()->is('/') ? 'bg-white/20' : '' }}">
                    <i class="fas fa-home text-lg"></i>
                </span>
                <span class="text-[10px] mt-0.5 font-medium">Utama</span>
            </a>
            <a href="{{ url('/berita') }}" class="flex flex-col items-center py-1.5 px-3 {{ request()->is('berita*') ? 'text-white' : 'text-primary-300' }} hover:text-white transition">
                <span class="w-10 h-10 rounded-xl flex items-center justify-center {{ request()->is('berita*') ? 'bg-white/20' : '' }}">
                    <i class="fas fa-newspaper text-lg"></i>
                </span>
                <span class="text-[10px] mt-0.5 font-medium">Berita</span>
            </a>
            <a href="{{ url('/kontak') }}" class="flex flex-col items-center -mt-5">
                <span class="w-14 h-14 bg-white text-primary-600 rounded-full flex items-center justify-center shadow-lg" style="box-shadow: 0 0 0 4px #166534">
                    <i class="fas fa-envelope text-xl"></i>
                </span>
                <span class="text-[10px] mt-1 font-medium text-white">Hubungi</span>
            </a>
            <a href="{{ url('/tentang') }}" class="flex flex-col items-center py-1.5 px-3 {{ request()->is('tentang') ? 'text-white' : 'text-primary-300' }} hover:text-white transition">
                <span class="w-10 h-10 rounded-xl flex items-center justify-center {{ request()->is('tentang') ? 'bg-white/20' : '' }}">
                    <i class="fas fa-info-circle text-lg"></i>
                </span>
                <span class="text-[10px] mt-0.5 font-medium">Tentang</span>
            </a>
            <button @click="slideMenuOpen = true" class="flex flex-col items-center py-1.5 px-3 text-primary-300 hover:text-white transition">
                <span class="w-10 h-10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-bars text-lg"></i>
                </span>
                <span class="text-[10px] mt-0.5 font-medium">Menu</span>
            </button>
        </div>
    </div>

    {{-- Slide Menu Overlay --}}
    <div class="slide-menu-overlay lg:hidden" :class="{ 'active': slideMenuOpen }" @click="slideMenuOpen = false"></div>
    
    {{-- Slide Menu --}}
    <div class="slide-menu lg:hidden" :class="{ 'active': slideMenuOpen }">
        <div class="slide-menu-handle"></div>
        <div class="px-4 pb-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900 text-sm">Menu Lain</h3>
                <button @click="slideMenuOpen = false" class="w-7 h-7 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-gray-500 text-xs"></i>
                </button>
            </div>
            <div class="space-y-1">
                <a href="{{ url('/kontak') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-primary-50 rounded-lg transition text-xs">
                    <i class="fas fa-envelope w-4 text-primary-600"></i> Hubungi Kami
                </a>
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-primary-50 rounded-lg transition text-xs">
                    <i class="fas fa-sign-in-alt w-4 text-primary-600"></i> Log Masuk Admin
                </a>
                <a href="https://wa.me/60192276874" target="_blank" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-green-50 rounded-lg transition text-xs">
                    <i class="fab fa-whatsapp w-4 text-green-600"></i> WhatsApp: Mohd Ali
                </a>
                <a href="https://wa.me/60105596218" target="_blank" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-green-50 rounded-lg transition text-xs">
                    <i class="fab fa-whatsapp w-4 text-green-600"></i> WhatsApp: Ustaz Ahmad
                </a>
                @if($facebook)
                <a href="{{ $facebook }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-blue-50 rounded-lg transition text-xs">
                    <i class="fab fa-facebook w-4 text-blue-600"></i> Facebook
                </a>
                @endif
                @if($instagram)
                <a href="{{ $instagram }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 text-gray-700 hover:bg-pink-50 rounded-lg transition text-xs">
                    <i class="fab fa-instagram w-4 text-pink-600"></i> Instagram
                </a>
                @endif
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-[10px] text-gray-400 text-center">{{ $address }}</p>
            </div>
        </div>
    </div>

    {{-- Floating WhatsApp Chat --}}
    <div class="whatsapp-float" x-data="{ open: false }">
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="whatsapp-popup">
            <div class="whatsapp-popup-header">
                <div class="flex items-center gap-2">
                    <i class="fab fa-whatsapp text-lg"></i>
                    <div>
                        <h3 class="font-bold text-xs">Hubungi Kami</h3>
                        <p class="text-[10px] opacity-90">Pilih untuk chat</p>
                    </div>
                </div>
            </div>
            <div>
                <a href="https://wa.me/60192276874" target="_blank" class="whatsapp-contact">
                    <div class="whatsapp-contact-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="whatsapp-contact-info flex-1">
                        <h4>Mohd Ali Bin Abu Bakar</h4>
                        <p>+60 19-227 6874</p>
                    </div>
                    <i class="fab fa-whatsapp text-green-500 text-sm"></i>
                </a>
                <a href="https://wa.me/60105596218" target="_blank" class="whatsapp-contact">
                    <div class="whatsapp-contact-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="whatsapp-contact-info flex-1">
                        <h4>Ustaz Ahmad Rabbani</h4>
                        <p>+60 10-559 6218</p>
                    </div>
                    <i class="fab fa-whatsapp text-green-500 text-sm"></i>
                </a>
            </div>
        </div>
        
        <button @click="open = !open" class="whatsapp-button relative">
            <span class="pulse-ring" x-show="!open"></span>
            <i class="fab fa-whatsapp" x-show="!open"></i>
            <i class="fas fa-times text-lg text-white" x-show="open" x-cloak></i>
        </button>
    </div>

</body>
</html>
