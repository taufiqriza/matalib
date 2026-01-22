<x-frontend.layout title="Laman Utama">

    {{-- ========================================
         HERO SECTION - Impak Visual Maksimum
    ========================================= --}}
    <section class="relative overflow-hidden min-h-[40vh] sm:min-h-[50vh] lg:min-h-[70vh] flex items-center">
        {{-- Background dengan Pattern --}}
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDMiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        <div class="relative w-full max-w-7xl mx-auto px-4 py-8 sm:py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-16 items-center">
                
                {{-- Konten Utama --}}
                <div class="text-center lg:text-left order-2 lg:order-1">
                    {{-- Bismillah --}}
                    <div class="mb-4 sm:mb-6">
                        <p class="arabic-text text-lg sm:text-xl lg:text-3xl text-white/70 mb-1">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                        <p class="text-primary-200 text-[10px] sm:text-xs">Dengan nama Allah Yang Maha Pemurah lagi Maha Penyayang</p>
                    </div>
                    
                    {{-- Tajuk Utama --}}
                    <h1 class="text-xl sm:text-2xl lg:text-4xl xl:text-5xl font-extrabold text-white mb-3 lg:mb-5 leading-tight">
                        Selamat Datang ke
                        <span class="block text-accent-400 mt-1">{{ \App\Models\Setting::get('site_name', 'Matalib') }}</span>
                    </h1>
                    
                    {{-- Tagline --}}
                    <p class="text-xs sm:text-sm lg:text-lg text-primary-100 mb-4 lg:mb-6 max-w-xl mx-auto lg:mx-0">
                        {{ \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib') }}
                    </p>
                    
                    {{-- CTA Buttons --}}
                    <div class="flex flex-row gap-2 sm:gap-3 justify-center lg:justify-start">
                        <a href="{{ url('/tentang') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 sm:px-6 sm:py-3 bg-white text-primary-700 font-semibold rounded-xl shadow-lg text-sm sm:text-base">
                            <i class="fas fa-info-circle text-xs sm:text-sm"></i>
                            <span>Tentang</span>
                        </a>
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 sm:px-6 sm:py-3 bg-white/20 text-white font-semibold rounded-xl border border-white/30 text-sm sm:text-base">
                            <i class="fas fa-envelope text-xs sm:text-sm"></i>
                            <span>Hubungi</span>
                        </a>
                    </div>
                </div>
                
                {{-- Statistik Kad - Compact --}}
                <div class="order-1 lg:order-2">
                    <div class="grid grid-cols-2 gap-2 sm:gap-3 max-w-sm mx-auto lg:max-w-none">
                        {{-- Stat 1 --}}
                        <div class="glass-card rounded-xl p-3 sm:p-4 text-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg sm:rounded-xl flex items-center justify-center mx-auto mb-2 shadow-md">
                                <i class="fas fa-book-quran text-white text-sm sm:text-lg"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900">30</h3>
                            <p class="text-gray-600 text-[10px] sm:text-xs font-medium">Juz Al-Quran</p>
                        </div>
                        
                        {{-- Stat 2 --}}
                        <div class="glass-card rounded-xl p-3 sm:p-4 text-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg sm:rounded-xl flex items-center justify-center mx-auto mb-2 shadow-md">
                                <i class="fas fa-user-graduate text-white text-sm sm:text-lg"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900">100<span class="text-primary-500">+</span></h3>
                            <p class="text-gray-600 text-[10px] sm:text-xs font-medium">Pelajar Aktif</p>
                        </div>
                        
                        {{-- Stat 3 --}}
                        <div class="glass-card rounded-xl p-3 sm:p-4 text-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-lg sm:rounded-xl flex items-center justify-center mx-auto mb-2 shadow-md">
                                <i class="fas fa-chalkboard-teacher text-white text-sm sm:text-lg"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900">20<span class="text-primary-500">+</span></h3>
                            <p class="text-gray-600 text-[10px] sm:text-xs font-medium">Guru & Ustaz</p>
                        </div>
                        
                        {{-- Stat 4 --}}
                        <div class="glass-card rounded-xl p-3 sm:p-4 text-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-rose-400 to-pink-500 rounded-lg sm:rounded-xl flex items-center justify-center mx-auto mb-2 shadow-md">
                                <i class="fas fa-award text-white text-sm sm:text-lg"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900">50<span class="text-primary-500">+</span></h3>
                            <p class="text-gray-600 text-[10px] sm:text-xs font-medium">Hafiz Lulus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Wave Divider --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" preserveAspectRatio="none">
                <path d="M0 80L48 74.7C96 69 192 59 288 53.3C384 48 480 48 576 50.7C672 53 768 59 864 61.3C960 64 1056 64 1152 58.7C1248 53 1344 43 1392 37.3L1440 32V80H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    {{-- ========================================
         MOTO MADRASAH - Berilmu Berakhlak Berjihad
    ========================================= --}}
    <section class="py-8 sm:py-12 lg:py-16 bg-gradient-to-b from-primary-50 to-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 relative">
            {{-- Section Header --}}
            <div class="text-center mb-6 sm:mb-10">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full mb-3">
                    <i class="fas fa-star text-[10px]"></i>
                    Moto Madrasah
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-gray-900 mb-3">
                    <span class="text-primary-600">Berilmu</span>, 
                    <span class="text-amber-600">Berakhlak</span>, 
                    <span class="text-emerald-600">Berjihad</span>
                </h2>
            </div>
            
            {{-- Moto Cards - Compact Mobile --}}
            <div class="space-y-3 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4">
                {{-- Berilmu --}}
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-md flex-shrink-0 sm:mb-3 sm:mx-auto">
                        <i class="fas fa-book-open text-white text-lg sm:text-xl"></i>
                    </div>
                    <div class="sm:text-center flex-1">
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-0.5">Berilmu</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Menuntut & mengamalkan ilmu pengetahuan</p>
                    </div>
                </div>
                
                {{-- Berakhlak --}}
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center shadow-md flex-shrink-0 sm:mb-3 sm:mx-auto">
                        <i class="fas fa-heart text-white text-lg sm:text-xl"></i>
                    </div>
                    <div class="sm:text-center flex-1">
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-0.5">Berakhlak</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Sahsiah & tingkah laku yang mulia</p>
                    </div>
                </div>
                
                {{-- Berjihad --}}
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-md flex-shrink-0 sm:mb-3 sm:mx-auto">
                        <i class="fas fa-fist-raised text-white text-lg sm:text-xl"></i>
                    </div>
                    <div class="sm:text-center flex-1">
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-0.5">Berjihad</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Usaha berterusan dalam kebaikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================
         KENAPA PILIH KAMI - Trust Building
    ========================================= --}}
    <section class="py-12 sm:py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            {{-- Section Header --}}
            <div class="text-center mb-10 lg:mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-check-circle"></i>
                    Kenapa Pilih Kami
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-gray-900 mb-4">
                    Kelebihan Belajar di <span class="text-primary-600">Matalib</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                    Persekitaran pembelajaran yang kondusif dengan bimbingan para huffaz berpengalaman
                </p>
            </div>
            
            {{-- Features Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                {{-- Feature 1 --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-quran text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Metode Mutqin</h3>
                    <p class="text-gray-600 text-sm">Kaedah hafalan yang terbukti berkesan dengan pemantapan bacaan berkualiti</p>
                </div>
                
                {{-- Feature 2 --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Guru Berpengalaman</h3>
                    <p class="text-gray-600 text-sm">Dibimbing oleh para huffaz yang telah hafal 30 juz dengan sanad bersambung</p>
                </div>
                
                {{-- Feature 3 - CCTV Security --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-red-200 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Keselamatan CCTV</h3>
                    <p class="text-gray-600 text-sm">Pergerakan dan aktiviti dikawal CCTV 24 jam untuk keselamatan pelajar</p>
                </div>
                
                {{-- Feature 4 --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-certificate text-white text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Sijil Diiktiraf</h3>
                    <p class="text-gray-600 text-sm">Pelajar menerima sijil tahfiz yang diiktiraf selepas menamatkan hafalan</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================
         AKTIVITI SUNNAH & KOKURIKULUM
    ========================================= --}}
    <section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-primary-900 via-primary-800 to-emerald-900 text-white relative overflow-hidden">
        {{-- Pattern --}}
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                {{-- Aktiviti Sunnah --}}
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 text-white text-sm font-semibold rounded-full mb-6">
                        <i class="fas fa-sun"></i>
                        Aktiviti Sunnah Mingguan
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold mb-6">
                        Sunnah Yang <span class="text-amber-400">Menarik</span>
                    </h2>
                    <p class="text-primary-200 mb-8">
                        Mengikuti sunnah Rasulullah ﷺ melalui aktiviti mingguan yang sihat dan menyeronokkan
                    </p>
                    
                    <div class="space-y-4">
                        {{-- Berenang --}}
                        <div class="group flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-2xl p-5 hover:bg-white/20 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-swimming-pool text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-white mb-1">Berenang</h3>
                                <p class="text-primary-200 text-sm">Aktiviti sunnah untuk kekuatan fizikal dan mental</p>
                            </div>
                            <div class="ml-auto">
                                <span class="px-3 py-1 bg-blue-500/30 text-blue-200 text-xs font-semibold rounded-full">Sunnah</span>
                            </div>
                        </div>
                        
                        {{-- Memanah --}}
                        <div class="group flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-2xl p-5 hover:bg-white/20 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-bullseye text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-white mb-1">Memanah</h3>
                                <p class="text-primary-200 text-sm">Melatih fokus, ketepatan dan kesabaran</p>
                            </div>
                            <div class="ml-auto">
                                <span class="px-3 py-1 bg-amber-500/30 text-amber-200 text-xs font-semibold rounded-full">Sunnah</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Kokurikulum --}}
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 text-white text-sm font-semibold rounded-full mb-6">
                        <i class="fas fa-medal"></i>
                        Kokurikulum
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold mb-6">
                        Seni Bela Diri <span class="text-emerald-400">Islami</span>
                    </h2>
                    <p class="text-primary-200 mb-8">
                        Membentuk pelajar yang kuat jasad, kukuh iman dan berdisiplin tinggi
                    </p>
                    
                    <div class="space-y-4">
                        {{-- Silat --}}
                        <div class="group flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-2xl p-5 hover:bg-white/20 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-hand-fist text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-white mb-1">Silat</h3>
                                <p class="text-primary-200 text-sm">Seni bela diri warisan Melayu dengan nilai-nilai Islam</p>
                            </div>
                            <div class="ml-auto">
                                <span class="px-3 py-1 bg-red-500/30 text-red-200 text-xs font-semibold rounded-full">Tradisi</span>
                            </div>
                        </div>
                        
                        {{-- Taekwondo --}}
                        <div class="group flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-2xl p-5 hover:bg-white/20 transition-all duration-300">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-user-ninja text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-white mb-1">Taekwondo</h3>
                                <p class="text-primary-200 text-sm">Disiplin, ketangkasan dan kecergasan fizikal</p>
                            </div>
                            <div class="ml-auto">
                                <span class="px-3 py-1 bg-indigo-500/30 text-indigo-200 text-xs font-semibold rounded-full">Sukan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Security Banner --}}
            <div class="mt-12 bg-white/10 backdrop-blur-sm rounded-2xl p-6 lg:p-8">
                <div class="flex flex-col lg:flex-row items-center gap-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-xl">
                        <i class="fas fa-video text-white text-3xl"></i>
                    </div>
                    <div class="text-center lg:text-left flex-grow">
                        <h3 class="font-bold text-2xl text-white mb-2">Sistem Keselamatan Yang Baik</h3>
                        <p class="text-primary-200">
                            Pergerakan dan aktiviti pelajar dikawal <strong class="text-white">CCTV 24 jam</strong> untuk memastikan keselamatan dan keselesaan sepanjang berada di madrasah
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                        <span class="text-white font-semibold">Live 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================
         PROGRAM UNGGULAN - Perkhidmatan Utama
    ========================================= --}}
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            {{-- Section Header --}}
            <div class="text-center mb-10 lg:mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-star"></i>
                    Program Unggulan
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-gray-900 mb-4">
                    Program Tahfiz Kami
                </h2>
                <p class="text-gray-600 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                    Menghafal Al-Qur'an dengan metodologi yang sistematik dan berkesan
                </p>
            </div>
            
            {{-- Programs Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                {{-- Program 1 --}}
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-500 to-emerald-500"></div>
                    <div class="p-6 sm:p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-900 mb-3">Tahfiz 30 Juz</h3>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                            Program unggulan menghafal seluruh 30 juz Al-Qur'an dalam tempoh 3 tahun dengan bimbingan intensif dan muraja'ah berkala.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-primary-500"></i>
                                Tempoh: 3 Tahun
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-primary-500"></i>
                                Kelas Intensif Harian
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-primary-500"></i>
                                Sijil Tahfiz
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center gap-2 text-primary-600 font-semibold hover:text-primary-700 group-hover:gap-3 transition-all">
                            Maklumat Lanjut <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                {{-- Program 2 --}}
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 to-orange-500"></div>
                    <div class="p-6 sm:p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-900 mb-3">Akademik Diniyah</h3>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                            Pembelajaran ilmu-ilmu agama seperti Fiqh, Aqidah, Sirah, dan Akhlak secara sistematik dan berstruktur.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-amber-500"></i>
                                Fiqh & Aqidah
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-amber-500"></i>
                                Sirah Nabawiyah
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-amber-500"></i>
                                Akhlak Islamiyah
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center gap-2 text-amber-600 font-semibold hover:text-amber-700 group-hover:gap-3 transition-all">
                            Maklumat Lanjut <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                {{-- Program 3 --}}
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500 sm:col-span-2 lg:col-span-1">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                    <div class="p-6 sm:p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <i class="fas fa-language text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-900 mb-3">Bahasa Arab</h3>
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                            Penguasaan bahasa Arab secara aktif melalui kaedah moden untuk memahami Al-Qur'an dengan lebih mendalam.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-blue-500"></i>
                                Nahu & Sorf
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-blue-500"></i>
                                Perbualan Aktif
                            </li>
                            <li class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-check text-blue-500"></i>
                                Balaghah
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700 group-hover:gap-3 transition-all">
                            Maklumat Lanjut <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================
         BERITA TERKINI - Content Section
    ========================================= --}}
    <section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-primary-50/50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            {{-- Section Header --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10 lg:mb-12">
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                        <i class="fas fa-newspaper"></i>
                        Berita Terkini
                    </span>
                    <h2 class="text-xl sm:text-2xl lg:text-4xl font-extrabold text-gray-900">
                        Kabar dari Matalib
                    </h2>
                </div>
                <a href="{{ url('/berita') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 hover:shadow-lg transition-all">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            {{-- News Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $posts = \App\Models\Post::where('status', 'published')
                        ->orderBy('published_at', 'desc')
                        ->limit(3)
                        ->get();
                @endphp
                
                @forelse($posts as $post)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="relative aspect-video overflow-hidden">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-4xl opacity-50"></i>
                        </div>
                        @endif
                        @if($post->category)
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-sm text-primary-700 text-xs font-semibold rounded-full shadow-sm">
                            {{ $post->category->name }}
                        </span>
                        @endif
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="far fa-calendar"></i>
                                {{ $post->published_at?->format('d M Y') }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="far fa-eye"></i>
                                {{ $post->views_count ?? 0 }}
                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-primary-600 transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                        </p>
                        <a href="{{ url('/berita/' . $post->slug) }}" class="inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:gap-3 transition-all">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Tiada Berita</h3>
                    <p class="text-gray-500 text-sm">Berita akan dikemas kini tidak lama lagi</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ========================================
         CTA SECTION - Call to Action
    ========================================= --}}
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="relative bg-gradient-to-r from-primary-600 via-primary-700 to-emerald-700 rounded-3xl overflow-hidden">
                {{-- Background Pattern --}}
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjEiPjxjaXJjbGUgY3g9IjMwIiBjeT0iMzAiIHI9IjIiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-50"></div>
                
                {{-- Decorative Elements --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-3xl"></div>
                
                <div class="relative px-6 py-12 sm:px-12 sm:py-16 lg:px-16 lg:py-20">
                    <div class="lg:flex lg:items-center lg:justify-between gap-8">
                        <div class="text-center lg:text-left mb-8 lg:mb-0">
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white mb-4">
                                Berminat Mendaftar?
                            </h2>
                            <p class="text-primary-100 text-sm sm:text-base lg:text-lg max-w-xl">
                                Sertailah program tahfiz kami dan jadilah sebahagian daripada generasi penghafal Al-Qur'an yang berakhlak mulia.
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-end">
                            @php $whatsapp = \App\Models\Setting::get('social_whatsapp'); @endphp
                            @if($whatsapp)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="group inline-flex items-center justify-center gap-2 px-6 py-3 sm:px-8 sm:py-4 bg-green-500 text-white font-bold rounded-xl shadow-lg hover:bg-green-600 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-whatsapp text-xl group-hover:scale-110 transition-transform"></i>
                                <span>Hubungi via WhatsApp</span>
                            </a>
                            @endif
                            <a href="{{ url('/kontak') }}" class="group inline-flex items-center justify-center gap-2 px-6 py-3 sm:px-8 sm:py-4 bg-white text-primary-700 font-bold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                <i class="fas fa-envelope group-hover:scale-110 transition-transform"></i>
                                <span>Kirim Mesej</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
