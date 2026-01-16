@php
    $logo = \App\Models\Setting::get('site_logo', 'logo-matalib.png');
    $siteName = \App\Models\Setting::get('site_name', 'Matalib');
    $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
@endphp
<!DOCTYPE html>
<html lang="ms" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk - {{ $siteName }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 
                            50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 300: '#86efac', 
                            400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d', 
                            800: '#166534', 900: '#14532d', 950: '#052e16'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
                        'arabic': ['Amiri', 'serif']
                    }
                }
            }
        }
    </script>
    
    @filamentStyles
    @vite('resources/css/app.css')
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .arabic-text { font-family: 'Amiri', serif; direction: rtl; }
    </style>
</head>
<body class="bg-gradient-to-br from-primary-50 via-white to-primary-100 min-h-screen">

    {{-- Header --}}
    <header class="bg-gradient-to-r from-primary-700 via-primary-600 to-primary-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-10 w-auto">
                    <div class="hidden sm:block">
                        <h1 class="text-white font-bold text-lg">{{ $siteName }}</h1>
                        <p class="text-primary-200 text-xs">{{ $siteTagline }}</p>
                    </div>
                </a>
                <a href="{{ url('/') }}" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                    <i class="fas fa-home"></i>
                    <span class="hidden sm:inline">Laman Utama</span>
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="min-h-[calc(100vh-180px)] flex items-center justify-center py-8 sm:py-12 px-4">
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    
                    {{-- Left - Info Panel --}}
                    <div class="hidden lg:flex lg:w-5/12 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 p-8 flex-col text-white relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjA1Ij48cGF0aCBkPSJNMzYgMzR2LTRoLTJ2NGgtNHYyaDR2NGgydi00aDR2LTJoLTR6bTAtMzBWMGgtMnY0aC00djJoNHY0aDJWNmg0VjRoLTR6TTYgMzR2LTRINHY0SDB2Mmg0djRoMnYtNGg0di0ySDZ6TTYgNFYwSDR2NEgwdjJoNHY0aDJWNmg0VjRINnoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="w-9 h-9 object-contain">
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold">{{ $siteName }}</h2>
                                    <p class="text-primary-200 text-sm">Panel Pentadbir</p>
                                </div>
                            </div>
                            
                            <p class="arabic-text text-xl text-white/80 mb-6 text-center">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                            
                            <div class="space-y-4 mt-8">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-book-quran"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Program Tahfiz</p>
                                        <p class="text-primary-200 text-sm">Menghafal 30 Juz Al-Quran</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Guru Berpengalaman</p>
                                        <p class="text-primary-200 text-sm">Huffaz berijazah sanad</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Akademik Diniyah</p>
                                        <p class="text-primary-200 text-sm">Fiqh, Aqidah, Sirah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right - Login Form --}}
                    <div class="lg:w-7/12">
                        {{-- Mobile Header --}}
                        <div class="lg:hidden bg-gradient-to-r from-primary-600 to-primary-800 px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-circle text-2xl text-white"></i>
                            </div>
                            <div>
                                <h1 class="text-lg font-bold text-white">Log Masuk Admin</h1>
                                <p class="text-primary-200 text-sm">Masukkan maklumat anda</p>
                            </div>
                        </div>

                        <div class="p-6 sm:p-8">
                            <div class="hidden lg:block mb-6">
                                <h1 class="text-xl font-bold text-gray-900">Log Masuk Admin</h1>
                                <p class="text-gray-500 text-sm">Masukkan e-mel dan kata laluan anda</p>
                            </div>

                            {{-- Filament Form --}}
                            <x-filament-panels::form wire:submit="authenticate">
                                {{ $this->form }}

                                <x-filament-panels::form.actions
                                    :actions="$this->getCachedFormActions()"
                                    :full-width="$this->hasFullWidthFormActions()"
                                />
                            </x-filament-panels::form>

                            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                                <p class="text-gray-500 text-sm">
                                    <a href="{{ url('/') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Laman Utama
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-primary-900 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <p class="text-primary-300 text-sm">© {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.</p>
        </div>
    </footer>

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
