<x-frontend.layout title="Visi & Misi">

    {{-- Page Header with Beautiful Design --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-emerald-900 py-16 sm:py-20 lg:py-24">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        {{-- Decorative Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-amber-400/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 text-center relative">
            {{-- Bismillah --}}
            <p class="arabic-text text-xl sm:text-2xl text-white/70 mb-4">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4">
                Visi & Misi
            </h1>
            <p class="text-primary-200 text-base sm:text-lg max-w-2xl mx-auto">
                Halatuju dan misi {{ \App\Models\Setting::get('site_name', 'Matalib') }} dalam membina generasi Al-Quran
            </p>
        </div>
    </section>

    {{-- Moto Section --}}
    <section class="py-16 sm:py-20 bg-gradient-to-b from-white to-primary-50 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-40 bg-amber-100 rounded-full blur-3xl opacity-50"></div>
        
        <div class="max-w-5xl mx-auto px-4 relative">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-bold rounded-full mb-6 shadow-lg">
                    <i class="fas fa-star"></i>
                    MOTO MADRASAH
                </span>
            </div>

            {{-- Moto Display --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-8">
                    <span class="bg-gradient-to-r from-primary-600 to-emerald-600 bg-clip-text text-transparent">Berilmu</span><span class="text-gray-400">,</span>
                    <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">Berakhlak</span><span class="text-gray-400">,</span>
                    <span class="bg-gradient-to-r from-emerald-500 to-teal-600 bg-clip-text text-transparent">Berjihad</span>
                </h2>
            </div>

            {{-- Moto Cards --}}
            <div class="grid md:grid-cols-3 gap-6 lg:gap-8">
                {{-- Berilmu --}}
                <div class="group bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-primary-100 to-emerald-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500">
                            <i class="fas fa-book-open text-white text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-4">Berilmu</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Sentiasa <strong class="text-primary-700">menuntut, menguasai dan mengamalkan</strong> ilmu pengetahuan. Ilmu menjadi asas dalam membuat keputusan yang betul, membezakan antara yang hak dan batil, serta membentuk pemikiran yang matang dan berwawasan.
                        </p>
                    </div>
                </div>
                
                {{-- Berakhlak --}}
                <div class="group bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-amber-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500">
                            <i class="fas fa-heart text-white text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-4">Berakhlak</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Pembentukan <strong class="text-amber-600">sahsiah dan tingkah laku yang mulia</strong>, seperti jujur, amanah, berdisiplin, hormat-menghormati dan bertanggungjawab. Ilmu yang dimiliki perlu disertai dengan akhlak yang baik agar memberi manfaat.
                        </p>
                    </div>
                </div>
                
                {{-- Berjihad --}}
                <div class="group bg-white rounded-3xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-emerald-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500">
                            <i class="fas fa-fist-raised text-white text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-4">Berjihad</h3>
                        <p class="text-gray-600 leading-relaxed">
                            <strong class="text-emerald-600">Kesungguhan, pengorbanan dan usaha berterusan</strong> dalam menegakkan kebenaran, memperbaiki diri, berkhidmat kepada masyarakat serta mempertahankan agama, bangsa dan negara.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Quote --}}
            <div class="mt-12 text-center">
                <div class="inline-flex items-center gap-4 px-8 py-5 bg-gradient-to-r from-primary-50 via-amber-50 to-emerald-50 rounded-2xl border border-primary-100 shadow-sm">
                    <i class="fas fa-quote-left text-primary-400 text-2xl"></i>
                    <p class="text-gray-700 font-medium italic text-lg">
                        "Keseimbangan antara kecerdasan intelek, kemuliaan akhlak dan kesungguhan berjuang demi kebaikan sejagat"
                    </p>
                    <i class="fas fa-quote-right text-primary-400 text-2xl"></i>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi Section --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Visi Content --}}
                <div>
                    <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-sm font-bold rounded-full mb-6 shadow-lg">
                        <i class="fas fa-bullseye"></i>
                        VISI MADRASAH
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">
                        Membina Generasi <span class="text-primary-600">Al-Quran</span>
                    </h2>
                    <div class="p-6 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Menjadi institusi pendidikan tahfiz Al-Qur'an yang <strong class="text-amber-600">cemerlang</strong> dalam melahirkan generasi hafiz yang <strong class="text-amber-600">berakhlak mulia</strong>, beriman teguh, dan bermanfaat kepada ummah.
                        </p>
                    </div>
                </div>
                
                {{-- Visi Visual --}}
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 lg:w-80 lg:h-80 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center shadow-2xl">
                            <div class="w-48 h-48 lg:w-60 lg:h-60 bg-white rounded-full flex items-center justify-center shadow-inner">
                                <div class="text-center">
                                    <i class="fas fa-star text-amber-500 text-5xl lg:text-6xl mb-4"></i>
                                    <p class="font-bold text-xl lg:text-2xl text-gray-800">VISI</p>
                                    <p class="text-amber-600 font-semibold">Generasi Al-Quran</p>
                                </div>
                            </div>
                        </div>
                        {{-- Floating Elements --}}
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-primary-500 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                            <i class="fas fa-book-quran text-white text-xl"></i>
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Misi Section --}}
    <section class="py-16 sm:py-20 bg-gradient-to-br from-primary-900 via-primary-800 to-emerald-900 text-white relative overflow-hidden">
        {{-- Pattern --}}
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        <div class="max-w-5xl mx-auto px-4 relative">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-teal-500 text-white text-sm font-bold rounded-full mb-6 shadow-lg">
                    <i class="fas fa-flag"></i>
                    MISI MADRASAH
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">
                    Menjadikan Madrasah Sebagai <span class="text-cyan-400">Pusat Pembentukan</span>
                </h2>
                <p class="text-primary-200 text-lg max-w-3xl mx-auto">
                    Menjadikan madrasah ini sebagai pusat pembentukan masyarakat yang sentiasa berpegang teguh kepada Al-Quran dalam membentuk generasi ummah
                </p>
            </div>

            {{-- Misi Points --}}
            <div class="grid sm:grid-cols-2 gap-6">
                {{-- Misi 1 --}}
                <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/10">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold text-xl">1</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white mb-2">Program Tahfiz Berkesan</h3>
                            <p class="text-primary-200 text-sm">Menyelenggara program tahfiz Al-Qur'an dengan kaedah yang berkesan dan terukur</p>
                        </div>
                    </div>
                </div>

                {{-- Misi 2 --}}
                <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/10">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold text-xl">2</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white mb-2">Pembinaan Akhlak</h3>
                            <p class="text-primary-200 text-sm">Membina akhlak dan adab Islami pada setiap pelajar</p>
                        </div>
                    </div>
                </div>

                {{-- Misi 3 --}}
                <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/10">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold text-xl">3</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white mb-2">Ilmu Seimbang</h3>
                            <p class="text-primary-200 text-sm">Membekalkan pelajar dengan ilmu agama dan pengetahuan umum yang seimbang</p>
                        </div>
                    </div>
                </div>

                {{-- Misi 4 --}}
                <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/10">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-rose-400 to-pink-500 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                            <span class="text-white font-bold text-xl">4</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white mb-2">Pusat Kajian Al-Quran</h3>
                            <p class="text-primary-200 text-sm">Menjadi pusat pembangunan kajian Al-Qur'an dan ilmu-ilmu keislaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="py-16 sm:py-20 bg-gradient-to-b from-white to-primary-50">
        <div class="max-w-5xl mx-auto px-4">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-heart"></i>
                    Nilai-Nilai Kami
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                    Nilai Yang Kami <span class="text-primary-600">Pegang</span>
                </h2>
            </div>

            {{-- Values Grid --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl p-6 text-center border border-primary-200 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-praying-hands text-white text-xl"></i>
                    </div>
                    <h4 class="font-bold text-primary-800 mb-1">Ikhlas</h4>
                    <p class="text-primary-600 text-xs">Beramal dengan niat ikhlas</p>
                </div>
                
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-6 text-center border border-amber-200 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <h4 class="font-bold text-amber-800 mb-1">Istiqomah</h4>
                    <p class="text-amber-600 text-xs">Konsisten dalam ibadah</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h4 class="font-bold text-blue-800 mb-1">Ukhuwah</h4>
                    <p class="text-blue-600 text-xs">Persaudaraan yang kukuh</p>
                </div>
                
                <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-2xl p-6 text-center border border-rose-200 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-hand-holding-heart text-white text-xl"></i>
                    </div>
                    <h4 class="font-bold text-rose-800 mb-1">Tawadhu</h4>
                    <p class="text-rose-600 text-xs">Rendah diri dalam sikap</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-gradient-to-r from-primary-600 to-emerald-600 rounded-3xl p-8 sm:p-12 text-center text-white shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjEiPjxjaXJjbGUgY3g9IjMwIiBjeT0iMzAiIHI9IjIiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
                <div class="relative">
                    <h3 class="text-2xl sm:text-3xl font-extrabold mb-4">Berminat Menyertai Kami?</h3>
                    <p class="text-primary-100 mb-6 max-w-xl mx-auto">
                        Jadilah sebahagian daripada generasi penghafal Al-Qur'an yang berakhlak mulia
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ url('/kontak') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary-700 font-bold rounded-xl hover:shadow-xl transition-all">
                            <i class="fas fa-envelope"></i>
                            Hubungi Kami
                        </a>
                        <a href="{{ url('/tentang') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/20 text-white font-bold rounded-xl border-2 border-white/30 hover:bg-white/30 transition-all">
                            <i class="fas fa-info-circle"></i>
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
