<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>{{ $title ?? 'Laman Utama' }} - {{ \App\Models\Setting::get('site_name', 'Matalib') }}</title>
    
    {{-- Favicon & Settings --}}
    @php
        $favicon = \App\Models\Setting::get('site_favicon');
        $logo = 'logo-matalib.png'; // Use the provided logo
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
    
    {{-- Preconnect --}}
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    {{-- Critical CSS --}}
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
        
        /* Mobile Bottom Padding for Bottom Nav */
        .main-content {
            padding-bottom: 5rem; /* pb-20 for bottom nav */
        }
        @media (min-width: 1024px) {
            .main-content {
                padding-bottom: 0;
            }
        }
        
        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: white;
            border-top: 1px solid #e5e7eb;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.08);
            padding: 0.5rem 0 calc(0.5rem + env(safe-area-inset-bottom));
        }
        .bottom-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            color: #6b7280;
            transition: all 0.2s;
            border-radius: 0.75rem;
        }
        .bottom-nav-item.active,
        .bottom-nav-item:hover {
            color: #16a34a;
        }
        .bottom-nav-item i {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }
        .bottom-nav-item span {
            font-size: 0.65rem;
            font-weight: 500;
        }
        
        /* Floating WhatsApp Styles */
        .whatsapp-float {
            position: fixed;
            bottom: 6rem;
            right: 1rem;
            z-index: 9999;
        }
        @media (min-width: 1024px) {
            .whatsapp-float {
                bottom: 1.5rem;
                right: 1.5rem;
            }
        }
        .whatsapp-button {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(37, 211, 102, 0.5);
        }
        .whatsapp-button i {
            font-size: 28px;
            color: white;
        }
        .whatsapp-popup {
            position: absolute;
            bottom: 70px;
            right: 0;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            width: 300px;
            overflow: hidden;
            transform-origin: bottom right;
        }
        @media (max-width: 400px) {
            .whatsapp-popup {
                width: calc(100vw - 2rem);
                right: -0.5rem;
            }
        }
        .whatsapp-popup-header {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            padding: 14px 16px;
            color: white;
        }
        .whatsapp-contact {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
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
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            flex-shrink: 0;
        }
        .whatsapp-contact-info h4 {
            font-weight: 600;
            font-size: 13px;
            color: #1a1a1a;
            margin: 0 0 2px 0;
        }
        .whatsapp-contact-info p {
            font-size: 12px;
            color: #666;
            margin: 0;
        }
        .pulse-ring {
            position: absolute;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.3);
            animation: pulse-ring 2s ease-out infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        
        /* Safe area for iOS */
        @supports (padding: env(safe-area-inset-bottom)) {
            .bottom-nav {
                padding-bottom: calc(0.5rem + env(safe-area-inset-bottom));
            }
            .main-content {
                padding-bottom: calc(5rem + env(safe-area-inset-bottom));
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
<body class="pattern-bg min-h-screen" x-data="{ mobileMenuOpen: false, whatsappOpen: false }">

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
        <div class="max-w-7xl mx-auto px-3 sm:px-4">
            <div class="flex items-center justify-between h-14 sm:h-16 lg:h-20">
                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-3">
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-8 sm:h-10 lg:h-12 w-auto">
                    <div class="hidden xs:block sm:block">
                        <h1 class="text-white font-bold text-sm sm:text-lg lg:text-xl leading-tight">{{ $siteName }}</h1>
                        <p class="text-primary-200 text-[10px] sm:text-xs lg:text-sm hidden sm:block">{{ $siteTagline }}</p>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex items-center gap-1">
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

                {{-- Right Side --}}
                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="{{ url('/admin') }}" class="hidden lg:flex items-center gap-2 px-4 py-2 text-sm font-medium text-primary-700 bg-white hover:bg-gray-50 rounded-xl shadow-sm transition">
                        <i class="fas fa-sign-in-alt"></i> Log Masuk
                    </a>
                    
                    {{-- Mobile: Quick WhatsApp --}}
                    <a href="https://wa.me/60192276874" class="lg:hidden w-9 h-9 sm:w-10 sm:h-10 bg-green-500 hover:bg-green-600 rounded-xl flex items-center justify-center text-white transition">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="main-content lg:pb-0">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-primary-900 text-white mt-8 lg:mt-16 pb-20 lg:pb-0">
        <div class="max-w-7xl mx-auto px-4 py-8 lg:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                {{-- Logo & Description --}}
                <div class="sm:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-10 lg:h-12 w-auto">
                        <div>
                            <h3 class="font-bold text-base lg:text-lg">{{ $siteName }}</h3>
                            <p class="text-primary-300 text-xs lg:text-sm">{{ $siteTagline }}</p>
                        </div>
                    </div>
                    <p class="text-primary-300 text-sm leading-relaxed mb-4">
                        {{ \App\Models\Setting::get('site_description', 'Platform digital rasmi untuk Madrasah Tahfiz Al Qur\'an Ibnu Talib. Menyediakan maklumat terkini, berita, dan galeri kegiatan madrasah.') }}
                    </p>
                    <div class="flex gap-3">
                        @if($facebook)<a href="{{ $facebook }}" target="_blank" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-blue-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-facebook-f"></i></a>@endif
                        @if($instagram)<a href="{{ $instagram }}" target="_blank" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-pink-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-instagram"></i></a>@endif
                        @if($youtube)<a href="{{ $youtube }}" target="_blank" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-red-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-youtube"></i></a>@endif
                        @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-green-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-whatsapp"></i></a>@endif
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="font-bold text-base lg:text-lg mb-3 lg:mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-primary-300 hover:text-white transition text-sm">Laman Utama</a></li>
                        <li><a href="{{ url('/berita') }}" class="text-primary-300 hover:text-white transition text-sm">Berita</a></li>
                        <li><a href="{{ url('/galeri') }}" class="text-primary-300 hover:text-white transition text-sm">Galeri</a></li>
                        <li><a href="{{ url('/tentang') }}" class="text-primary-300 hover:text-white transition text-sm">Tentang Kami</a></li>
                        <li><a href="{{ url('/kontak') }}" class="text-primary-300 hover:text-white transition text-sm">Hubungi Kami</a></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="font-bold text-base lg:text-lg mb-3 lg:mb-4">Hubungi</h4>
                    <ul class="space-y-3">
                        @if($email)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-envelope text-primary-400 mt-1 text-sm"></i>
                            <span class="text-primary-300 text-sm">{{ $email }}</span>
                        </li>
                        @endif
                        @if($phone)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-phone text-primary-400 mt-1 text-sm"></i>
                            <span class="text-primary-300 text-sm">{{ $phone }}</span>
                        </li>
                        @endif
                        @if($address)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-primary-400 mt-1 text-sm"></i>
                            <span class="text-primary-300 text-sm">{{ $address }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-primary-800 mt-6 lg:mt-8 pt-6 lg:pt-8 text-center">
                <p class="text-primary-400 text-xs lg:text-sm">
                    © {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.
                </p>
            </div>
        </div>
    </footer>

    {{-- Mobile Bottom Navigation --}}
    <nav class="bottom-nav lg:hidden">
        <div class="max-w-lg mx-auto px-2">
            <div class="flex items-center justify-around">
                <a href="{{ url('/') }}" class="bottom-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Utama</span>
                </a>
                <a href="{{ url('/berita') }}" class="bottom-nav-item {{ request()->is('berita*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
                <a href="{{ url('/galeri') }}" class="bottom-nav-item {{ request()->is('galeri*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
                <a href="{{ url('/tentang') }}" class="bottom-nav-item {{ request()->is('tentang') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    <span>Tentang</span>
                </a>
                <a href="{{ url('/kontak') }}" class="bottom-nav-item {{ request()->is('kontak') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Hubungi</span>
                </a>
            </div>
        </div>
    </nav>

    {{-- Floating WhatsApp Chat --}}
    <div class="whatsapp-float" x-data="{ open: false }">
        {{-- Popup --}}
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="whatsapp-popup">
            <div class="whatsapp-popup-header">
                <div class="flex items-center gap-3">
                    <i class="fab fa-whatsapp text-2xl"></i>
                    <div>
                        <h3 class="font-bold text-sm">Hubungi Kami</h3>
                        <p class="text-xs opacity-90">Pilih untuk chat WhatsApp</p>
                    </div>
                </div>
            </div>
            <div>
                {{-- Contact 1: Mohd Ali --}}
                <a href="https://wa.me/60192276874" target="_blank" class="whatsapp-contact">
                    <div class="whatsapp-contact-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="whatsapp-contact-info flex-1">
                        <h4>Mohd Ali Bin Abu Bakar</h4>
                        <p>+60 19-227 6874</p>
                    </div>
                    <i class="fab fa-whatsapp text-green-500 text-lg"></i>
                </a>
                {{-- Contact 2: Ustaz Ahmad --}}
                <a href="https://wa.me/60105596218" target="_blank" class="whatsapp-contact">
                    <div class="whatsapp-contact-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="whatsapp-contact-info flex-1">
                        <h4>Ustaz Ahmad Rabbani</h4>
                        <p>+60 10-559 6218</p>
                    </div>
                    <i class="fab fa-whatsapp text-green-500 text-lg"></i>
                </a>
            </div>
        </div>
        
        {{-- Main Button --}}
        <button @click="open = !open" class="whatsapp-button relative">
            <span class="pulse-ring" x-show="!open"></span>
            <i class="fab fa-whatsapp" x-show="!open"></i>
            <i class="fas fa-times text-xl text-white" x-show="open" x-cloak></i>
        </button>
    </div>

</body>
</html>
