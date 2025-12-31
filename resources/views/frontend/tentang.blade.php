<x-frontend.layout title="Tentang Kami">

    {{-- Page Header --}}
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-2">Tentang Kami</h1>
            <p class="text-primary-200">Mengenal lebih dekat {{ \App\Models\Setting::get('site_name', 'Matalib') }}</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="max-w-4xl mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 lg:p-12">
            
            {{-- Arabic Bismillah --}}
            <div class="text-center mb-12">
                <p class="font-arabic text-3xl text-primary-700 mb-2" dir="rtl">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                <p class="text-gray-500 text-sm">Dengan menyebut nama Allah Yang Maha Pengasih lagi Maha Penyayang</p>
            </div>
            
            <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700">
                <h2 class="text-2xl font-bold text-primary-700 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-bullseye text-primary-600"></i>
                    </span>
                    Visi
                </h2>
                <p class="text-lg">
                    Menjadi lembaga pendidikan tahfiz Al-Qur'an yang unggul dalam mencetak generasi hafiz yang berakhlak mulia, beriman kuat, dan bermanfaat bagi umat.
                </p>
                
                <h2 class="text-2xl font-bold text-primary-700 flex items-center gap-3 mt-12">
                    <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-flag text-primary-600"></i>
                    </span>
                    Misi
                </h2>
                <ul class="space-y-2">
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-sm">1</span>
                        <span>Menyelenggarakan program tahfiz Al-Qur'an dengan metode yang efektif dan terukur</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-sm">2</span>
                        <span>Membina akhlak dan adab Islami pada setiap santri</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-sm">3</span>
                        <span>Membekali santri dengan ilmu agama dan pengetahuan umum yang seimbang</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-primary-500 text-white rounded-full flex items-center justify-center shrink-0 mt-0.5 text-sm">4</span>
                        <span>Menjadi pusat pengembangan kajian Al-Qur'an dan ilmu-ilmu keislaman</span>
                    </li>
                </ul>
                
                <h2 class="text-2xl font-bold text-primary-700 flex items-center gap-3 mt-12">
                    <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-heart text-primary-600"></i>
                    </span>
                    Nilai-Nilai Kami
                </h2>
                
                <div class="grid md:grid-cols-2 gap-4 not-prose mt-6">
                    <div class="bg-primary-50 rounded-xl p-5 border border-primary-100">
                        <h4 class="font-bold text-primary-800 mb-1">Ikhlas</h4>
                        <p class="text-gray-600 text-sm">Beramal dengan niat yang tulus karena Allah SWT</p>
                    </div>
                    <div class="bg-amber-50 rounded-xl p-5 border border-amber-100">
                        <h4 class="font-bold text-amber-800 mb-1">Istiqomah</h4>
                        <p class="text-gray-600 text-sm">Konsisten dalam ibadah dan pembelajaran</p>
                    </div>
                    <div class="bg-blue-50 rounded-xl p-5 border border-blue-100">
                        <h4 class="font-bold text-blue-800 mb-1">Ukhuwah</h4>
                        <p class="text-gray-600 text-sm">Membangun persaudaraan yang kuat antar santri</p>
                    </div>
                    <div class="bg-rose-50 rounded-xl p-5 border border-rose-100">
                        <h4 class="font-bold text-rose-800 mb-1">Tawadhu</h4>
                        <p class="text-gray-600 text-sm">Rendah hati dalam sikap dan perbuatan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend.layout>
