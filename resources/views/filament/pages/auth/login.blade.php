<x-filament-panels::page.simple>
    @php
        $logo = \App\Models\Setting::get('site_logo', 'logo-matalib.png');
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
    @endphp

    <style>
        /* Override Filament simple layout */
        .fi-simple-layout {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%) !important;
            min-height: 100vh;
        }
        .fi-simple-main-ctn {
            width: 100%;
            max-width: 900px !important;
        }
        .fi-simple-header {
            display: none !important;
        }
        body { font-family: 'Inter', sans-serif; }
        .arabic-text { font-family: 'Amiri', serif; direction: rtl; }
    </style>

    {{-- Custom Header --}}
    <div class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-green-700 via-green-600 to-green-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-14">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-8 w-auto">
                    <div class="hidden sm:block">
                        <span class="text-white font-bold">{{ $siteName }}</span>
                    </div>
                </a>
                <a href="{{ url('/') }}" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="hidden sm:inline">Laman Utama</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Spacer for fixed header --}}
    <div class="h-14"></div>

    {{-- Login Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mt-6">
        <div class="flex flex-col lg:flex-row">
            
            {{-- Left Panel - Info --}}
            <div class="hidden lg:flex lg:w-5/12 bg-gradient-to-br from-green-600 via-green-700 to-green-800 p-8 flex-col text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="w-9 h-9 object-contain">
                        </div>
                        <div>
                            <h2 class="text-lg font-bold">{{ $siteName }}</h2>
                            <p class="text-green-200 text-sm">Panel Pentadbir</p>
                        </div>
                    </div>
                    
                    <p class="arabic-text text-lg text-white/80 mb-6 text-center">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                    
                    <div class="space-y-3 mt-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                            </div>
                            <span class="text-sm">Program Tahfiz 30 Juz</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z"></path></svg>
                            </div>
                            <span class="text-sm">Guru Hafiz Berpengalaman</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-sm">Sijil Tahfiz Diiktiraf</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Panel - Form --}}
            <div class="lg:w-7/12 p-6 lg:p-8">
                {{-- Mobile Header --}}
                <div class="lg:hidden flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-gray-900">Log Masuk Admin</h1>
                        <p class="text-gray-500 text-xs">Masukkan maklumat anda</p>
                    </div>
                </div>

                {{-- Desktop Title --}}
                <div class="hidden lg:block mb-6">
                    <h1 class="text-xl font-bold text-gray-900">Log Masuk Admin</h1>
                    <p class="text-gray-500 text-sm">Masukkan e-mel dan kata laluan anda</p>
                </div>

                {{-- Filament Login Form --}}
                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament-panels::form.actions
                        :actions="$this->getCachedFormActions()"
                        :full-width="$this->hasFullWidthFormActions()"
                    />
                </x-filament-panels::form>

                {{-- Footer Link --}}
                <div class="mt-6 pt-4 border-t border-gray-100 text-center">
                    <a href="{{ url('/') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">
                        ← Kembali ke Laman Utama
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="mt-6 text-center">
        <p class="text-gray-500 text-xs">© {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.</p>
    </div>

    {{-- Load fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Amiri&display=swap" rel="stylesheet">
</x-filament-panels::page.simple>
