<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Beranda' }} - {{ \App\Models\Setting::get('site_name', 'Matalib') }}</title>
    
    {{-- Favicon --}}
    @php
        $favicon = \App\Models\Setting::get('site_favicon');
        $logo = \App\Models\Setting::get('site_logo');
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
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
    </style>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="pattern-bg min-h-screen" x-data="{ mobileMenuOpen: false }">

    {{-- Top Bar --}}
    <div class="bg-primary-900 text-white text-xs hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center gap-4">
                @php $phone = \App\Models\Setting::get('site_phone'); @endphp
                @if($phone)
                <a href="tel:{{ $phone }}" class="flex items-center gap-1 hover:text-primary-200">
                    <i class="fas fa-phone"></i> {{ $phone }}
                </a>
                @endif
                @php $email = \App\Models\Setting::get('site_email'); @endphp
                @if($email)
                <a href="mailto:{{ $email }}" class="flex items-center gap-1 hover:text-primary-200">
                    <i class="fas fa-envelope"></i> {{ $email }}
                </a>
                @endif
            </div>
            <div class="flex items-center gap-3">
                @php 
                    $facebook = \App\Models\Setting::get('social_facebook');
                    $instagram = \App\Models\Setting::get('social_instagram');
                    $youtube = \App\Models\Setting::get('social_youtube');
                    $whatsapp = \App\Models\Setting::get('social_whatsapp');
                @endphp
                @if($youtube)<a href="{{ $youtube }}" target="_blank" class="hover:text-red-400"><i class="fab fa-youtube"></i></a>@endif
                @if($instagram)<a href="{{ $instagram }}" target="_blank" class="hover:text-pink-400"><i class="fab fa-instagram"></i></a>@endif
                @if($facebook)<a href="{{ $facebook }}" target="_blank" class="hover:text-blue-400"><i class="fab fa-facebook"></i></a>@endif
                @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="hover:text-green-400"><i class="fab fa-whatsapp"></i></a>@endif
            </div>
        </div>
    </div>

    {{-- Main Header --}}
    <header class="hero-gradient sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16 lg:h-20">
                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    @if($logo)
                        <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-10 lg:h-12 w-auto">
                    @else
                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-book-quran text-white text-xl"></i>
                        </div>
                    @endif
                    <div class="hidden sm:block">
                        <h1 class="text-white font-bold text-lg lg:text-xl leading-tight">{{ $siteName }}</h1>
                        <p class="text-primary-200 text-xs lg:text-sm">{{ $siteTagline }}</p>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-home text-xs"></i> Beranda
                    </a>
                    <a href="{{ url('/berita') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-newspaper text-xs"></i> Berita
                    </a>
                    <a href="{{ url('/galeri') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-images text-xs"></i> Galeri
                    </a>
                    <a href="{{ url('/tentang') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-info-circle text-xs"></i> Tentang
                    </a>
                    <a href="{{ url('/kontak') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                        <i class="fas fa-envelope text-xs"></i> Kontak
                    </a>
                </nav>

                {{-- Right Side --}}
                <div class="flex items-center gap-3">
                    <a href="{{ url('/admin') }}" class="hidden lg:flex items-center gap-2 px-4 py-2 text-sm font-medium text-primary-700 bg-white hover:bg-gray-50 rounded-xl shadow-sm transition">
                        <i class="fas fa-sign-in-alt"></i> Login Admin
                    </a>
                    
                    {{-- Mobile Menu Button --}}
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white transition">
                        <i class="fas" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" x-cloak x-transition class="lg:hidden bg-primary-800 border-t border-primary-700">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                    <i class="fas fa-home w-5"></i> Beranda
                </a>
                <a href="{{ url('/berita') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                    <i class="fas fa-newspaper w-5"></i> Berita
                </a>
                <a href="{{ url('/galeri') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                    <i class="fas fa-images w-5"></i> Galeri
                </a>
                <a href="{{ url('/tentang') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                    <i class="fas fa-info-circle w-5"></i> Tentang
                </a>
                <a href="{{ url('/kontak') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                    <i class="fas fa-envelope w-5"></i> Kontak
                </a>
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-3 bg-white text-primary-700 font-semibold rounded-xl transition">
                    <i class="fas fa-sign-in-alt w-5"></i> Login Admin
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-primary-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Logo & Description --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        @if($logo)
                            <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-12 w-auto">
                        @else
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-book-quran text-white text-2xl"></i>
                            </div>
                        @endif
                        <div>
                            <h3 class="font-bold text-lg">{{ $siteName }}</h3>
                            <p class="text-primary-300 text-sm">{{ $siteTagline }}</p>
                        </div>
                    </div>
                    <p class="text-primary-300 text-sm leading-relaxed mb-4">
                        {{ \App\Models\Setting::get('site_description', 'Platform digital resmi untuk Madrasah Tahfiz Al Qur\'an Ibnu Talib. Menyediakan informasi terkini, berita, dan galeri kegiatan madrasah.') }}
                    </p>
                    <div class="flex gap-3">
                        @if($facebook)<a href="{{ $facebook }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-blue-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-facebook-f"></i></a>@endif
                        @if($instagram)<a href="{{ $instagram }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-pink-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-instagram"></i></a>@endif
                        @if($youtube)<a href="{{ $youtube }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-red-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-youtube"></i></a>@endif
                        @if($whatsapp)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-green-600 rounded-xl flex items-center justify-center transition"><i class="fab fa-whatsapp"></i></a>@endif
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="font-bold text-lg mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-primary-300 hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ url('/berita') }}" class="text-primary-300 hover:text-white transition">Berita</a></li>
                        <li><a href="{{ url('/galeri') }}" class="text-primary-300 hover:text-white transition">Galeri</a></li>
                        <li><a href="{{ url('/tentang') }}" class="text-primary-300 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="{{ url('/kontak') }}" class="text-primary-300 hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="font-bold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-3">
                        @if($email)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-envelope text-primary-400 mt-1"></i>
                            <span class="text-primary-300 text-sm">{{ $email }}</span>
                        </li>
                        @endif
                        @if($phone)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-phone text-primary-400 mt-1"></i>
                            <span class="text-primary-300 text-sm">{{ $phone }}</span>
                        </li>
                        @endif
                        @php $address = \App\Models\Setting::get('site_address'); @endphp
                        @if($address)
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-primary-400 mt-1"></i>
                            <span class="text-primary-300 text-sm">{{ $address }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-primary-800 mt-8 pt-8 text-center">
                <p class="text-primary-400 text-sm">
                    © {{ date('Y') }} {{ $siteName }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
