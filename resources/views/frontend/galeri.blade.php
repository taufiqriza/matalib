<x-frontend.layout title="Galeri">

    {{-- Page Header --}}
    <section class="relative bg-gradient-to-r from-primary-600 via-primary-700 to-emerald-700 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjA1Ij48Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIyIi8+PC9nPjwvZz48L3N2Zz4=')]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 lg:py-20">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-images"></i>
                    Dokumentasi
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-5xl font-extrabold text-white mb-4">Galeri Foto</h1>
                <p class="text-primary-100 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                    Koleksi momen indah aktiviti dan program di Matalib
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" preserveAspectRatio="none">
                <path d="M0 60L48 55C96 50 192 40 288 35C384 30 480 30 576 32C672 35 768 40 864 42C960 45 1056 45 1152 42C1248 40 1344 35 1392 32L1440 30V60H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    {{-- Gallery Content --}}
    <section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-primary-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            {{-- Filter Tabs --}}
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10 lg:mb-12" x-data="{ activeTab: 'semua' }">
                <button @click="activeTab = 'semua'" 
                    :class="activeTab === 'semua' ? 'bg-primary-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 sm:px-6 py-2 sm:py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                    Semua
                </button>
                <button @click="activeTab = 'aktiviti'" 
                    :class="activeTab === 'aktiviti' ? 'bg-primary-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 sm:px-6 py-2 sm:py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                    Aktiviti
                </button>
                <button @click="activeTab = 'kelas'" 
                    :class="activeTab === 'kelas' ? 'bg-primary-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 sm:px-6 py-2 sm:py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                    Kelas
                </button>
                <button @click="activeTab = 'majlis'" 
                    :class="activeTab === 'majlis' ? 'bg-primary-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                    class="px-4 sm:px-6 py-2 sm:py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                    Majlis
                </button>
            </div>
            
            {{-- Gallery Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                {{-- Sample Gallery Items - Replace with dynamic data later --}}
                @for($i = 1; $i <= 8; $i++)
                <div class="group relative aspect-square rounded-xl sm:rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                        <i class="fas fa-image text-white text-3xl sm:text-4xl opacity-30"></i>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white font-semibold text-sm sm:text-base">Aktiviti {{ $i }}</p>
                        <p class="text-white/80 text-xs sm:text-sm">Januari 2026</p>
                    </div>
                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="w-8 h-8 sm:w-10 sm:h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-expand text-primary-600 text-sm"></i>
                        </span>
                    </div>
                </div>
                @endfor
            </div>
            
            {{-- Empty State (if no images) --}}
            {{-- 
            <div class="text-center py-16 lg:py-24">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-images text-gray-400 text-4xl"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-2">Galeri Kosong</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto">
                    Koleksi gambar akan dikemas kini tidak lama lagi. Sila kunjungi semula halaman ini.
                </p>
            </div>
            --}}
            
            {{-- Load More Button --}}
            <div class="text-center mt-10 lg:mt-12">
                <button class="inline-flex items-center gap-2 px-8 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-plus"></i>
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="bg-gradient-to-r from-primary-600 to-emerald-600 rounded-2xl sm:rounded-3xl p-6 sm:p-10 text-center">
                <h3 class="text-xl sm:text-2xl font-bold text-white mb-3">Ingin Melihat Lebih Banyak?</h3>
                <p class="text-primary-100 text-sm sm:text-base mb-6">
                    Ikuti kami di media sosial untuk kemaskini terkini
                </p>
                <div class="flex justify-center gap-3">
                    @php
                        $facebook = \App\Models\Setting::get('social_facebook');
                        $instagram = \App\Models\Setting::get('social_instagram');
                        $youtube = \App\Models\Setting::get('social_youtube');
                    @endphp
                    @if($facebook)
                    <a href="{{ $facebook }}" target="_blank" class="w-12 h-12 bg-white/20 hover:bg-blue-600 rounded-xl flex items-center justify-center text-white transition-colors">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    @endif
                    @if($instagram)
                    <a href="{{ $instagram }}" target="_blank" class="w-12 h-12 bg-white/20 hover:bg-pink-600 rounded-xl flex items-center justify-center text-white transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    @endif
                    @if($youtube)
                    <a href="{{ $youtube }}" target="_blank" class="w-12 h-12 bg-white/20 hover:bg-red-600 rounded-xl flex items-center justify-center text-white transition-colors">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
