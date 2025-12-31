<x-frontend.layout title="Laman Utama">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-50"></div>
        
        <div class="relative max-w-7xl mx-auto px-3 lg:px-4 py-6 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-4 lg:gap-12 items-center">
                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    <p class="arabic-text text-base lg:text-3xl text-primary-200 mb-2 lg:mb-4">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                    
                    <h1 class="text-lg lg:text-5xl font-extrabold text-white mb-2 lg:mb-4 leading-tight">
                        Selamat Datang ke<br>
                        <span class="text-accent-400">{{ \App\Models\Setting::get('site_name', 'Matalib') }}</span>
                    </h1>
                    
                    <p class="text-xs lg:text-xl text-primary-100 mb-4 lg:mb-8">
                        {{ \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib') }}
                    </p>
                    
                    <div class="flex gap-2 lg:gap-4 justify-center lg:justify-start">
                        <a href="{{ url('/tentang') }}" class="inline-flex items-center justify-center gap-1.5 lg:gap-2 px-3 py-1.5 lg:px-6 lg:py-3 bg-white text-primary-700 font-semibold rounded-lg lg:rounded-xl shadow-lg hover:shadow-xl transition-all text-[10px] lg:text-base">
                            <i class="fas fa-info-circle text-[10px] lg:text-base"></i> Tentang Kami
                        </a>
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-1.5 lg:gap-2 px-3 py-1.5 lg:px-6 lg:py-3 bg-primary-600 text-white font-semibold rounded-lg lg:rounded-xl border border-white/20 hover:bg-primary-500 transition-all text-[10px] lg:text-base">
                            <i class="fas fa-envelope text-[10px] lg:text-base"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
                
                {{-- Stats Cards --}}
                <div class="grid grid-cols-4 lg:grid-cols-2 gap-2 lg:gap-4">
                    <div class="glass-card rounded-lg lg:rounded-2xl p-2 lg:p-6 text-center">
                        <div class="w-6 h-6 lg:w-14 lg:h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg lg:rounded-2xl flex items-center justify-center mx-auto mb-1 lg:mb-3 shadow-lg">
                            <i class="fas fa-book-quran text-white text-[10px] lg:text-2xl"></i>
                        </div>
                        <h3 class="text-sm lg:text-2xl font-bold text-gray-900">30</h3>
                        <p class="text-gray-500 text-[8px] lg:text-sm">Juz</p>
                    </div>
                    <div class="glass-card rounded-lg lg:rounded-2xl p-2 lg:p-6 text-center">
                        <div class="w-6 h-6 lg:w-14 lg:h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg lg:rounded-2xl flex items-center justify-center mx-auto mb-1 lg:mb-3 shadow-lg">
                            <i class="fas fa-user-graduate text-white text-[10px] lg:text-2xl"></i>
                        </div>
                        <h3 class="text-sm lg:text-2xl font-bold text-gray-900">100+</h3>
                        <p class="text-gray-500 text-[8px] lg:text-sm">Pelajar</p>
                    </div>
                    <div class="glass-card rounded-lg lg:rounded-2xl p-2 lg:p-6 text-center">
                        <div class="w-6 h-6 lg:w-14 lg:h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg lg:rounded-2xl flex items-center justify-center mx-auto mb-1 lg:mb-3 shadow-lg">
                            <i class="fas fa-chalkboard-teacher text-white text-[10px] lg:text-2xl"></i>
                        </div>
                        <h3 class="text-sm lg:text-2xl font-bold text-gray-900">20+</h3>
                        <p class="text-gray-500 text-[8px] lg:text-sm">Guru</p>
                    </div>
                    <div class="glass-card rounded-lg lg:rounded-2xl p-2 lg:p-6 text-center">
                        <div class="w-6 h-6 lg:w-14 lg:h-14 bg-gradient-to-br from-rose-500 to-pink-500 rounded-lg lg:rounded-2xl flex items-center justify-center mx-auto mb-1 lg:mb-3 shadow-lg">
                            <i class="fas fa-award text-white text-[10px] lg:text-2xl"></i>
                        </div>
                        <h3 class="text-sm lg:text-2xl font-bold text-gray-900">50+</h3>
                        <p class="text-gray-500 text-[8px] lg:text-sm">Hafiz</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Wave --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-6 lg:h-auto">
                <path d="M0 60L60 52C120 45 240 30 360 22C480 15 600 15 720 19C840 22 960 30 1080 34C1200 37 1320 37 1380 37L1440 37V60H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    {{-- Program Section --}}
    <section class="max-w-7xl mx-auto px-3 lg:px-4 py-6 lg:py-16">
        <div class="text-center mb-4 lg:mb-12">
            <span class="inline-block px-2 py-0.5 lg:px-4 lg:py-1.5 bg-primary-100 text-primary-700 text-[9px] lg:text-sm font-semibold rounded-full mb-2 lg:mb-4">
                <i class="fas fa-star mr-1"></i> Program Unggulan
            </span>
            <h2 class="text-base lg:text-4xl font-bold text-gray-900 mb-1 lg:mb-4">Program Tahfiz Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-[10px] lg:text-base">Menghafal Al-Qur'an dengan metode yang berkesan</p>
        </div>
        
        <div class="grid grid-cols-3 gap-2 lg:gap-6">
            {{-- Program 1 --}}
            <div class="bg-white rounded-lg lg:rounded-2xl p-3 lg:p-6 shadow-sm border border-gray-100">
                <div class="w-8 h-8 lg:w-14 lg:h-14 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-lg lg:rounded-2xl flex items-center justify-center mb-2 lg:mb-4">
                    <i class="fas fa-book-open text-white text-xs lg:text-xl"></i>
                </div>
                <h3 class="font-bold text-[10px] lg:text-xl text-gray-900 mb-1 lg:mb-2">Tahfiz 30 Juz</h3>
                <p class="text-gray-600 text-[8px] lg:text-sm mb-2 lg:mb-4 line-clamp-2">Program menghafal 30 juz dalam 3 tahun</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-[8px] lg:text-sm">
                    Lagi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            {{-- Program 2 --}}
            <div class="bg-white rounded-lg lg:rounded-2xl p-3 lg:p-6 shadow-sm border border-gray-100">
                <div class="w-8 h-8 lg:w-14 lg:h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg lg:rounded-2xl flex items-center justify-center mb-2 lg:mb-4">
                    <i class="fas fa-mosque text-white text-xs lg:text-xl"></i>
                </div>
                <h3 class="font-bold text-[10px] lg:text-xl text-gray-900 mb-1 lg:mb-2">Kajian Kitab</h3>
                <p class="text-gray-600 text-[8px] lg:text-sm mb-2 lg:mb-4 line-clamp-2">Pembelajaran kitab kuning bersanad</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-[8px] lg:text-sm">
                    Lagi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            {{-- Program 3 --}}
            <div class="bg-white rounded-lg lg:rounded-2xl p-3 lg:p-6 shadow-sm border border-gray-100">
                <div class="w-8 h-8 lg:w-14 lg:h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg lg:rounded-2xl flex items-center justify-center mb-2 lg:mb-4">
                    <i class="fas fa-language text-white text-xs lg:text-xl"></i>
                </div>
                <h3 class="font-bold text-[10px] lg:text-xl text-gray-900 mb-1 lg:mb-2">Bahasa Arab</h3>
                <p class="text-gray-600 text-[8px] lg:text-sm mb-2 lg:mb-4 line-clamp-2">Penguasaan bahasa Arab aktif</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-[8px] lg:text-sm">
                    Lagi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- News Section --}}
    <section class="bg-gradient-to-b from-white to-primary-50 py-6 lg:py-16">
        <div class="max-w-7xl mx-auto px-3 lg:px-4">
            <div class="flex items-center justify-between mb-4 lg:mb-8">
                <div>
                    <span class="inline-block px-2 py-0.5 lg:px-4 lg:py-1.5 bg-primary-100 text-primary-700 text-[9px] lg:text-sm font-semibold rounded-full mb-1 lg:mb-2">
                        <i class="fas fa-newspaper mr-1"></i> Berita
                    </span>
                    <h2 class="text-sm lg:text-3xl font-bold text-gray-900">Berita Terkini</h2>
                </div>
                <a href="{{ url('/berita') }}" class="hidden lg:inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 transition text-sm">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-6">
                @php
                    $posts = \App\Models\Post::where('status', 'published')
                        ->orderBy('published_at', 'desc')
                        ->limit(4)
                        ->get();
                @endphp
                
                @forelse($posts as $post)
                <article class="bg-white rounded-lg lg:rounded-2xl overflow-hidden shadow-sm border border-gray-100 {{ $loop->index >= 2 ? 'hidden lg:block' : '' }}">
                    @if($post->featured_image)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-xl lg:text-4xl opacity-50"></i>
                    </div>
                    @endif
                    <div class="p-2 lg:p-5">
                        <div class="flex items-center gap-1 lg:gap-2 text-[8px] lg:text-xs text-gray-500 mb-1 lg:mb-2">
                            <span><i class="far fa-calendar mr-0.5"></i> {{ $post->published_at?->format('d M') }}</span>
                            @if($post->category)
                            <span class="px-1 lg:px-2 py-0.5 bg-primary-100 text-primary-700 rounded-full text-[7px] lg:text-xs">{{ $post->category->name }}</span>
                            @endif
                        </div>
                        <h3 class="font-bold text-[10px] lg:text-lg text-gray-900 mb-1 lg:mb-2 line-clamp-2">{{ $post->title }}</h3>
                        <a href="{{ url('/berita/' . $post->slug) }}" class="inline-flex items-center text-primary-600 font-medium text-[8px] lg:text-sm">
                            Baca <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-8 lg:py-12">
                    <div class="w-12 h-12 lg:w-20 lg:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2 lg:mb-4">
                        <i class="fas fa-newspaper text-gray-400 text-lg lg:text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1 text-xs lg:text-base">Tiada Berita</h3>
                    <p class="text-gray-500 text-[10px] lg:text-sm">Berita akan dikemas kini</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-4 lg:hidden">
                <a href="{{ url('/berita') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary-600 text-white font-medium rounded-lg transition text-[10px]">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="max-w-7xl mx-auto px-3 lg:px-4 py-6 lg:py-16">
        <div class="relative bg-gradient-to-r from-primary-600 via-primary-700 to-emerald-700 rounded-xl lg:rounded-3xl overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-50"></div>
            
            <div class="relative px-4 py-5 lg:px-12 lg:py-16 text-center lg:text-left lg:flex items-center justify-between gap-8">
                <div class="mb-4 lg:mb-0">
                    <h2 class="text-sm lg:text-3xl font-bold text-white mb-1 lg:mb-3">Berminat Mendaftar?</h2>
                    <p class="text-primary-100 text-[10px] lg:text-lg">Sertai program tahfiz kami sekarang</p>
                </div>
                <div class="flex gap-2 lg:gap-4 justify-center lg:justify-end">
                    @php $whatsapp = \App\Models\Setting::get('social_whatsapp'); @endphp
                    @if($whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="inline-flex items-center justify-center gap-1 lg:gap-2 px-3 py-1.5 lg:px-6 lg:py-3 bg-green-500 text-white font-semibold rounded-lg lg:rounded-xl shadow-lg hover:bg-green-600 transition text-[10px] lg:text-base">
                        <i class="fab fa-whatsapp text-xs lg:text-xl"></i> WhatsApp
                    </a>
                    @endif
                    <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-1 lg:gap-2 px-3 py-1.5 lg:px-6 lg:py-3 bg-white text-primary-700 font-semibold rounded-lg lg:rounded-xl shadow-lg hover:bg-gray-50 transition text-[10px] lg:text-base">
                        <i class="fas fa-envelope text-[10px] lg:text-base"></i> Hubungi
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
