<x-frontend.layout title="Visi & Misi">

    {{-- Compact Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-emerald-900 py-8 sm:py-12 lg:py-16">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDMiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        <div class="max-w-4xl mx-auto px-4 text-center relative">
            <p class="arabic-text text-lg sm:text-xl text-white/60 mb-2">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white mb-2">Visi & Misi</h1>
            <p class="text-primary-200 text-sm sm:text-base">{{ \App\Models\Setting::get('site_name', 'Matalib') }}</p>
        </div>
    </section>

    {{-- Moto Section - Compact Mobile --}}
    <section class="py-8 sm:py-12 bg-gradient-to-b from-white to-primary-50">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Moto Badge --}}
            <div class="text-center mb-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full shadow-lg">
                    <i class="fas fa-star text-[10px]"></i>
                    MOTO MADRASAH
                </span>
            </div>

            {{-- Moto Title --}}
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-center mb-6">
                <span class="text-primary-600">Berilmu</span><span class="text-gray-400">,</span>
                <span class="text-amber-500">Berakhlak</span><span class="text-gray-400">,</span>
                <span class="text-emerald-600">Berjihad</span>
            </h2>

            {{-- Moto Cards - Compact for Mobile --}}
            <div class="space-y-3 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4">
                {{-- Berilmu --}}
                <div class="flex sm:flex-col items-center sm:items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 sm:mb-3">
                        <i class="fas fa-book-open text-white text-lg sm:text-xl"></i>
                    </div>
                    <div class="sm:text-center flex-1">
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-0.5">Berilmu</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Menuntut & mengamalkan ilmu</p>
                    </div>
                </div>
                
                {{-- Berakhlak --}}
                <div class="flex sm:flex-col items-center sm:items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 sm:mb-3">
                        <i class="fas fa-heart text-white text-lg sm:text-xl"></i>
                    </div>
                    <div class="sm:text-center flex-1">
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-0.5">Berakhlak</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Sahsiah & tingkah laku mulia</p>
                    </div>
                </div>
                
                {{-- Berjihad --}}
                <div class="flex sm:flex-col items-center sm:items-center gap-3 sm:gap-0 bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 sm:mb-3">
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

    {{-- Visi & Misi Combined - App Style --}}
    <section class="py-8 sm:py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Visi Card --}}
            <div class="mb-4 sm:mb-6">
                <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-5 sm:p-6 border border-amber-100">
                    <div class="text-center sm:text-left sm:flex sm:items-start sm:gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg mx-auto sm:mx-0 mb-3 sm:mb-0 flex-shrink-0">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-bold rounded-full mb-3">VISI MADRASAH</span>
                            <h3 class="font-extrabold text-xl sm:text-2xl text-gray-900 mb-2">Membina Generasi al-Quran</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Misi Card --}}
            <div class="bg-gradient-to-br from-cyan-600 via-teal-600 to-emerald-700 rounded-2xl p-5 sm:p-6 text-white relative overflow-hidden">
                {{-- Decorative --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="relative">
                    <div class="text-center sm:text-left sm:flex sm:items-start sm:gap-4 mb-4">
                        <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mx-auto sm:mx-0 mb-3 sm:mb-0 flex-shrink-0">
                            <i class="fas fa-flag text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-bold rounded-full mb-3">MISI MADRASAH</span>
                            <p class="text-white text-base sm:text-lg leading-relaxed font-medium">
                                Menjadikan madrasah ini sebagai pusat pembentukan masyarakat yang sentiasa berpegang teguh kepada al-Quran dalam membentuk generasi ummah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values - Compact Grid --}}
    <section class="py-8 sm:py-12 bg-gradient-to-b from-primary-50 to-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary-100 text-primary-700 text-xs font-semibold rounded-full">
                    <i class="fas fa-heart text-[10px]"></i>
                    Nilai-Nilai Kami
                </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="bg-white rounded-xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg mx-auto mb-2 flex items-center justify-center">
                        <i class="fas fa-praying-hands text-white text-sm"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Ikhlas</h4>
                    <p class="text-gray-500 text-[10px]">Niat kerana Allah</p>
                </div>
                
                <div class="bg-white rounded-xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg mx-auto mb-2 flex items-center justify-center">
                        <i class="fas fa-clock text-white text-sm"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Istiqomah</h4>
                    <p class="text-gray-500 text-[10px]">Konsisten beribadah</p>
                </div>
                
                <div class="bg-white rounded-xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg mx-auto mb-2 flex items-center justify-center">
                        <i class="fas fa-users text-white text-sm"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Ukhuwah</h4>
                    <p class="text-gray-500 text-[10px]">Persaudaraan kukuh</p>
                </div>
                
                <div class="bg-white rounded-xl p-4 text-center border border-gray-100 shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-rose-500 to-rose-600 rounded-lg mx-auto mb-2 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-white text-sm"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-sm">Tawadhu</h4>
                    <p class="text-gray-500 text-[10px]">Rendah diri</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA - Compact --}}
    <section class="py-6 sm:py-8 pb-24 lg:pb-8">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-gradient-to-r from-primary-600 to-emerald-600 rounded-2xl p-5 sm:p-6 text-center text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjEiPjxjaXJjbGUgY3g9IjMwIiBjeT0iMzAiIHI9IjIiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-50"></div>
                <div class="relative">
                    <h3 class="text-lg sm:text-xl font-bold mb-2">Berminat Menyertai?</h3>
                    <p class="text-primary-100 text-sm mb-4">Jadilah sebahagian daripada generasi Al-Quran</p>
                    <div class="flex flex-col sm:flex-row gap-2 justify-center">
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-primary-700 font-semibold rounded-xl text-sm hover:shadow-lg transition-all">
                            <i class="fas fa-envelope"></i>
                            Hubungi Kami
                        </a>
                        @php $whatsapp = \App\Models\Setting::get('social_whatsapp'); @endphp
                        @if($whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-green-500 text-white font-semibold rounded-xl text-sm hover:bg-green-600 transition-all">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
