<x-frontend.layout title="Tentang Kami">

    {{-- Page Header --}}
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-8 sm:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-2">Tentang Kami</h1>
            <p class="text-primary-200 text-sm sm:text-base">Kenali {{ \App\Models\Setting::get('site_name', 'Matalib') }} dengan lebih dekat</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="max-w-4xl mx-auto px-4 py-8 sm:py-12 lg:py-16">
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-8 lg:p-12">
            
            {{-- Arabic Bismillah --}}
            <div class="text-center mb-8 sm:mb-12">
                <p class="font-arabic text-2xl sm:text-3xl text-primary-700 mb-2" dir="rtl">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                <p class="text-gray-500 text-xs sm:text-sm">Dengan nama Allah Yang Maha Pemurah lagi Maha Penyayang</p>
            </div>
            
            {{-- Content --}}
            <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700">
                
                {{-- MOTO MADRASAH --}}
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-star text-amber-600 text-sm sm:text-base"></i>
                    </span>
                    Moto Madrasah
                </h2>
                <div class="not-prose bg-gradient-to-r from-primary-50 via-amber-50 to-emerald-50 rounded-2xl p-6 sm:p-8 border border-primary-100 mb-8">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-center mb-6">
                        <span class="text-primary-600">Berilmu</span>, 
                        <span class="text-amber-600">Berakhlak</span> dan 
                        <span class="text-emerald-600">Berjihad</span>
                    </h3>
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-book-open text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Berilmu</h4>
                            <p class="text-gray-600 text-xs">Menuntut, menguasai dan mengamalkan ilmu pengetahuan</p>
                        </div>
                        <div class="text-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-heart text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Berakhlak</h4>
                            <p class="text-gray-600 text-xs">Pembentukan sahsiah dan tingkah laku yang mulia</p>
                        </div>
                        <div class="text-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-fist-raised text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Berjihad</h4>
                            <p class="text-gray-600 text-xs">Kesungguhan dan usaha berterusan dalam kebaikan</p>
                        </div>
                    </div>
                </div>

                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bullseye text-primary-600 text-sm sm:text-base"></i>
                    </span>
                    Visi
                </h2>
                <p class="text-sm sm:text-base lg:text-lg">
                    Menjadi institusi pendidikan tahfiz Al-Qur'an yang cemerlang dalam melahirkan generasi hafiz yang berakhlak mulia, beriman teguh, dan bermanfaat kepada ummah.
                </p>
                
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3 mt-8 sm:mt-12">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-flag text-primary-600 text-sm sm:text-base"></i>
                    </span>
                    Misi
                </h2>
                <ul class="space-y-2 sm:space-y-3 not-prose">
                    <li class="flex items-start gap-3">
                        <span class="w-5 h-5 sm:w-6 sm:h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs sm:text-sm">1</span>
                        <span class="text-gray-700 text-sm sm:text-base">Menyelenggara program tahfiz Al-Qur'an dengan kaedah yang berkesan dan terukur</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-5 h-5 sm:w-6 sm:h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs sm:text-sm">2</span>
                        <span class="text-gray-700 text-sm sm:text-base">Membina akhlak dan adab Islami pada setiap pelajar</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-5 h-5 sm:w-6 sm:h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs sm:text-sm">3</span>
                        <span class="text-gray-700 text-sm sm:text-base">Membekalkan pelajar dengan ilmu agama dan pengetahuan umum yang seimbang</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-5 h-5 sm:w-6 sm:h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs sm:text-sm">4</span>
                        <span class="text-gray-700 text-sm sm:text-base">Menjadi pusat pembangunan kajian Al-Qur'an dan ilmu-ilmu keislaman</span>
                    </li>
                </ul>
                
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3 mt-8 sm:mt-12">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-heart text-primary-600 text-sm sm:text-base"></i>
                    </span>
                    Nilai-Nilai Kami
                </h2>
                
                <div class="grid grid-cols-2 gap-3 sm:gap-4 not-prose mt-4 sm:mt-6">
                    <div class="bg-primary-50 rounded-xl p-4 sm:p-5 border border-primary-100">
                        <h4 class="font-bold text-primary-800 mb-1 text-sm sm:text-base">Ikhlas</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Beramal dengan niat yang ikhlas kerana Allah SWT</p>
                    </div>
                    <div class="bg-amber-50 rounded-xl p-4 sm:p-5 border border-amber-100">
                        <h4 class="font-bold text-amber-800 mb-1 text-sm sm:text-base">Istiqomah</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Konsisten dalam ibadah dan pembelajaran</p>
                    </div>
                    <div class="bg-blue-50 rounded-xl p-4 sm:p-5 border border-blue-100">
                        <h4 class="font-bold text-blue-800 mb-1 text-sm sm:text-base">Ukhuwah</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Membina persaudaraan yang kukuh antara pelajar</p>
                    </div>
                    <div class="bg-rose-50 rounded-xl p-4 sm:p-5 border border-rose-100">
                        <h4 class="font-bold text-rose-800 mb-1 text-sm sm:text-base">Tawadhu</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Rendah diri dalam sikap dan perbuatan</p>
                    </div>
                </div>

                {{-- KESELAMATAN --}}
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3 mt-8 sm:mt-12">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shield-alt text-red-600 text-sm sm:text-base"></i>
                    </span>
                    Keselamatan
                </h2>
                <div class="not-prose bg-red-50 rounded-2xl p-5 sm:p-6 border border-red-100 flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-video text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Sistem Keselamatan CCTV 24 Jam</h4>
                        <p class="text-gray-600 text-sm">Pergerakan dan aktiviti pelajar dikawal CCTV untuk memastikan keselamatan dan keselesaan sepanjang berada di madrasah</p>
                    </div>
                </div>

                {{-- AKTIVITI SUNNAH --}}
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3 mt-8 sm:mt-12">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-sun text-amber-600 text-sm sm:text-base"></i>
                    </span>
                    Aktiviti Sunnah Mingguan
                </h2>
                <div class="not-prose grid sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-swimming-pool text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Berenang</h4>
                            <p class="text-gray-600 text-sm">Aktiviti sunnah untuk kekuatan fizikal dan mental</p>
                        </div>
                    </div>
                    <div class="bg-amber-50 rounded-xl p-5 border border-amber-100 flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Memanah</h4>
                            <p class="text-gray-600 text-sm">Melatih fokus, ketepatan dan kesabaran</p>
                        </div>
                    </div>
                </div>

                {{-- KOKURIKULUM --}}
                <h2 class="text-xl sm:text-2xl font-bold text-primary-700 flex items-center gap-3 mt-8 sm:mt-12">
                    <span class="w-8 h-8 sm:w-10 sm:h-10 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-medal text-indigo-600 text-sm sm:text-base"></i>
                    </span>
                    Kokurikulum - Seni Bela Diri
                </h2>
                <div class="not-prose grid sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-red-50 rounded-xl p-5 border border-red-100 flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-hand-fist text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Silat</h4>
                            <p class="text-gray-600 text-sm">Seni bela diri warisan Melayu dengan nilai-nilai Islam</p>
                        </div>
                    </div>
                    <div class="bg-indigo-50 rounded-xl p-5 border border-indigo-100 flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-ninja text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Taekwondo</h4>
                            <p class="text-gray-600 text-sm">Disiplin, ketangkasan dan kecergasan fizikal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
