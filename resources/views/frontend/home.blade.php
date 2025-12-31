<x-frontend.layout title="Beranda">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden">
        {{-- Background --}}
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-50"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    {{-- Arabic Bismillah --}}
                    <p class="arabic-text text-2xl lg:text-3xl text-primary-200 mb-4">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                    
                    <h1 class="text-3xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
                        Selamat Datang di<br>
                        <span class="text-accent-400">{{ \App\Models\Setting::get('site_name', 'Matalib') }}</span>
                    </h1>
                    
                    <p class="text-lg lg:text-xl text-primary-100 mb-8">
                        {{ \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib') }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ url('/tentang') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-primary-700 font-semibold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                            <i class="fas fa-info-circle"></i> Tentang Kami
                        </a>
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl border-2 border-white/20 hover:bg-primary-500 transition-all">
                            <i class="fas fa-envelope"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
                
                {{-- Right Content - Stats Cards --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass-card rounded-2xl p-6 text-center transform hover:scale-105 transition-all">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-book-quran text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">30</h3>
                        <p class="text-gray-500 text-sm">Juz Al-Qur'an</p>
                    </div>
                    <div class="glass-card rounded-2xl p-6 text-center transform hover:scale-105 transition-all">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-user-graduate text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">100+</h3>
                        <p class="text-gray-500 text-sm">Santri</p>
                    </div>
                    <div class="glass-card rounded-2xl p-6 text-center transform hover:scale-105 transition-all">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">20+</h3>
                        <p class="text-gray-500 text-sm">Guru & Ustaz</p>
                    </div>
                    <div class="glass-card rounded-2xl p-6 text-center transform hover:scale-105 transition-all">
                        <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-award text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">50+</h3>
                        <p class="text-gray-500 text-sm">Hafiz Lulus</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Wave Divider --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    {{-- Program Unggulan --}}
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                <i class="fas fa-star mr-1"></i> Program Unggulan
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Program Tahfiz Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Menghafal Al-Qur'an dengan metode yang terbukti efektif, dibimbing oleh para hafiz berpengalaman</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Program 1 --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 transition-all group">
                <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-book-open text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-2">Tahfiz 30 Juz</h3>
                <p class="text-gray-600 text-sm mb-4">Program unggulan menghafal 30 juz Al-Qur'an dalam 3 tahun dengan metode mutqin</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                    Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            {{-- Program 2 --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 transition-all group">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-mosque text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-2">Kajian Kitab</h3>
                <p class="text-gray-600 text-sm mb-4">Pembelajaran kitab kuning dengan sanad yang bersambung ke para ulama terdahulu</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                    Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            {{-- Program 3 --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-200 transition-all group">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-language text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-2">Bahasa Arab</h3>
                <p class="text-gray-600 text-sm mb-4">Penguasaan bahasa Arab secara aktif untuk memahami Al-Qur'an dengan lebih mendalam</p>
                <a href="#" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                    Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Latest News --}}
    <section class="bg-gradient-to-b from-white to-primary-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-2">
                        <i class="fas fa-newspaper mr-1"></i> Berita Terkini
                    </span>
                    <h2 class="text-3xl font-bold text-gray-900">Kabar dari Matalib</h2>
                </div>
                <a href="{{ url('/berita') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 transition">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $posts = \App\Models\Post::where('status', 'published')
                        ->orderBy('published_at', 'desc')
                        ->limit(3)
                        ->get();
                @endphp
                
                @forelse($posts as $post)
                <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                    @if($post->featured_image)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl opacity-50"></i>
                    </div>
                    @endif
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                            <span><i class="far fa-calendar mr-1"></i> {{ $post->published_at?->format('d M Y') }}</span>
                            @if($post->category)
                            <span class="px-2 py-0.5 bg-primary-100 text-primary-700 rounded-full">{{ $post->category->name }}</span>
                            @endif
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition">{{ $post->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ url('/berita/' . $post->slug) }}" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500 text-sm">Berita akan segera diperbarui</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-8 sm:hidden">
                <a href="{{ url('/berita') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 transition">
                    Lihat Semua Berita <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="relative bg-gradient-to-r from-primary-600 via-primary-700 to-emerald-700 rounded-3xl overflow-hidden">
            {{-- Pattern --}}
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-50"></div>
            
            <div class="relative px-8 py-12 lg:px-12 lg:py-16 text-center lg:text-left lg:flex items-center justify-between gap-8">
                <div class="mb-8 lg:mb-0">
                    <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Tertarik Mendaftar?</h2>
                    <p class="text-primary-100 lg:text-lg">Bergabunglah bersama kami untuk menghafal Al-Qur'an dengan metode yang terbukti</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-end">
                    @php $whatsapp = \App\Models\Setting::get('social_whatsapp'); @endphp
                    @if($whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-500 text-white font-semibold rounded-xl shadow-lg hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp text-xl"></i> Hubungi via WhatsApp
                    </a>
                    @endif
                    <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-primary-700 font-semibold rounded-xl shadow-lg hover:bg-gray-50 transition">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
