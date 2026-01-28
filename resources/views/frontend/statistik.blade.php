<x-frontend.layout title="Statistik Terkini">

    {{-- Compact Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-emerald-900 py-8 sm:py-12 lg:py-16">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDMiPjxwYXRoIGQ9Ik0zNiAxOGMtNi42MjcgMC0xMiA1LjM3My0xMiAxMnM1LjM3MyAxMiAxMiAxMiAxMi01LjM3MyAxMi0xMi01LjM3My0xMi0xMi0xMnptMCAyMGMtNC40MTggMC04LTMuNTgyLTgtOHMzLjU4Mi04IDgtOCA4IDMuNTgyIDggOC0zLjU4MiA4LTggOHoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        
        <div class="max-w-4xl mx-auto px-4 text-center relative">
            <p class="arabic-text text-lg sm:text-xl text-white/60 mb-2">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white mb-2">Statistik Terkini</h1>
            <p class="text-primary-200 text-sm sm:text-base">Jumlah Pelajar & Guru MATALIB</p>
        </div>
    </section>

    {{-- Student Statistics --}}
    <section class="py-8 sm:py-12 bg-white relative">
        <div class="max-w-4xl mx-auto px-4">
            
            {{-- Header --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-graduate text-primary-600"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Pelajar</h2>
                    <p class="text-xs text-gray-500">Jumlah keseluruhan</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-700 rounded-full text-xs font-bold border border-primary-100">
                        45 Orang
                    </span>
                </div>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-2 gap-4">
                {{-- Banin --}}
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-5 border border-blue-100 relative overflow-hidden group hover:border-blue-200 transition-all">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Banin</span>
                            <i class="fas fa-mars text-blue-400 text-lg"></i>
                        </div>
                        <div class="flex items-end gap-1">
                            <h3 class="text-3xl font-extrabold text-blue-900">32</h3>
                            <span class="text-xs text-blue-600 font-medium mb-1.5">pelajar</span>
                        </div>
                        <div class="mt-3 h-1.5 w-full bg-blue-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: {{ (32/45)*100 }}%"></div>
                        </div>
                    </div>
                </div>

                {{-- Banat --}}
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-5 border border-pink-100 relative overflow-hidden group hover:border-pink-200 transition-all">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-pink-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-pink-600 uppercase tracking-wider">Banat</span>
                            <i class="fas fa-venus text-pink-400 text-lg"></i>
                        </div>
                        <div class="flex items-end gap-1">
                            <h3 class="text-3xl font-extrabold text-pink-900">13</h3>
                            <span class="text-xs text-pink-600 font-medium mb-1.5">pelajar</span>
                        </div>
                        <div class="mt-3 h-1.5 w-full bg-pink-100 rounded-full overflow-hidden">
                            <div class="h-full bg-pink-500 rounded-full" style="width: {{ (13/45)*100 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Teacher Statistics --}}
    <section class="py-8 sm:py-12 bg-gray-50 pb-24 lg:pb-12">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Header --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-amber-600"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Tenaga Pengajar</h2>
                    <p class="text-xs text-gray-500">Guru & Ustaz</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-bold border border-amber-100">
                        7 Orang
                    </span>
                </div>
            </div>

            {{-- Teachers List --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 divide-y divide-gray-100">
                {{-- Guru Lelaki --}}
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                            <i class="fas fa-user-tie text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Guru Lelaki</h4>
                            <p class="text-xs text-gray-500">Ustaz & Pembimbing</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="block text-xl font-bold text-indigo-600">4</span>
                        <span class="text-[10px] text-gray-400">orang</span>
                    </div>
                </div>

                {{-- Guru Perempuan --}}
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Guru Perempuan</h4>
                            <p class="text-xs text-gray-500">Ustazah & Pembimbing</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="block text-xl font-bold text-rose-600">3</span>
                        <span class="text-[10px] text-gray-400">orang</span>
                    </div>
                </div>
            </div>

            {{-- Info Banner --}}
            <div class="mt-6 p-4 bg-primary-50 rounded-xl border border-primary-100 flex gap-3">
                <i class="fas fa-info-circle text-primary-500 mt-0.5"></i>
                <p class="text-xs text-primary-700 leading-relaxed">
                    Data statistik ini dikemaskini pada <strong>28 Januari 2026</strong>. Jumlah pelajar dan guru mungkin berubah dari semasa ke semasa.
                </p>
            </div>
        </div>
    </section>

</x-frontend.layout>
