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
            
            <div class="prose prose-sm sm:prose-base lg:prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700">
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
            </div>
        </div>
    </section>

</x-frontend.layout>
