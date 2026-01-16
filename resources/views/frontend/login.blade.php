<x-frontend.layout title="Log Masuk">
    @php
        $logo = \App\Models\Setting::get('site_logo', 'logo-matalib.png');
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
    @endphp

    <div class="min-h-[70vh] flex items-center justify-center py-8 sm:py-12 px-4">
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    
                    {{-- Left - Info Panel (Hidden on Mobile) --}}
                    <div class="hidden lg:flex lg:w-5/12 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 p-8 flex-col text-white relative overflow-hidden">
                        {{-- Pattern Background --}}
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0zNiAzNHYtNGgtMnY0aC00djJoNHY0aDJ2LTRoNHYtMmgtNHptMC0zMFYwaC0ydjRoLTR2Mmg0djRoMlY2aDRWNGgtNHpNNiAzNHYtNEg0djRIMHYyaDR2NGgydi00aDR2LTJINHPTTY2IDRWMEI0djRIMHYyaDR2NGgyVjZoNFY0SDZ6Jy8+PC9nPjwvZz48L3N2Zz4=')] opacity-50"></div>
                        
                        {{-- Decorative Circles --}}
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16"></div>
                        
                        <div class="relative z-10">
                            {{-- Logo & Title --}}
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="w-9 h-9 object-contain">
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold">{{ $siteName }}</h2>
                                    <p class="text-primary-200 text-sm">{{ $siteTagline }}</p>
                                </div>
                            </div>
                            
                            {{-- Bismillah --}}
                            <p class="arabic-text text-xl text-white/80 mb-6 text-center">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                            
                            {{-- Features --}}
                            <div class="flex-1 space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-book-quran"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Program Tahfiz 30 Juz</p>
                                        <p class="text-primary-200 text-sm">Menghafal Al-Quran dengan metode berkesan</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Guru Hafiz Berpengalaman</p>
                                        <p class="text-primary-200 text-sm">Dibimbing oleh para huffaz berijazah</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Akademik Diniyah</p>
                                        <p class="text-primary-200 text-sm">Fiqh, Aqidah, Sirah & Akhlak</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sijil Diiktiraf</p>
                                        <p class="text-primary-200 text-sm">Sijil tahfiz yang diiktiraf resmi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right - Login Form --}}
                    <div class="lg:w-7/12">
                        {{-- Mobile Header --}}
                        <div class="lg:hidden bg-gradient-to-r from-primary-600 to-primary-800 px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-circle text-2xl text-white"></i>
                            </div>
                            <div>
                                <h1 class="text-lg font-bold text-white">Log Masuk</h1>
                                <p class="text-primary-200 text-sm">Sila masukkan maklumat anda</p>
                            </div>
                        </div>

                        <div class="p-6 sm:p-8">
                            {{-- Desktop Title --}}
                            <div class="hidden lg:block mb-6">
                                <h1 class="text-xl font-bold text-gray-900">Log Masuk Admin</h1>
                                <p class="text-gray-500 text-sm">Masukkan e-mel dan kata laluan anda</p>
                            </div>

                            {{-- Error Alert --}}
                            @if(session('error'))
                            <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-4 rounded-xl mb-5 flex items-start gap-3">
                                <i class="fas fa-exclamation-circle mt-0.5"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                            @endif

                            {{-- Success Alert --}}
                            @if(session('success'))
                            <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 text-sm p-4 rounded-xl mb-5 flex items-start gap-3">
                                <i class="fas fa-check-circle mt-0.5"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                            @endif

                            {{-- Login Form - Redirect to Filament --}}
                            <form method="POST" action="{{ url('/admin/login') }}" class="space-y-5">
                                @csrf
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">E-mel</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input type="email" name="email" required 
                                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition bg-gray-50 focus:bg-white"
                                            placeholder="nama@email.com"
                                            value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kata Laluan</label>
                                    <div class="relative" x-data="{ show: false }">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <input :type="show ? 'text' : 'password'" name="password" required 
                                            class="w-full pl-12 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition bg-gray-50 focus:bg-white"
                                            placeholder="••••••••">
                                        <button type="button" @click="show = !show" 
                                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                                            <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-between">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                                    </label>
                                </div>

                                <button type="submit" 
                                    class="w-full py-3.5 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-bold rounded-xl shadow-lg shadow-primary-600/30 hover:shadow-xl hover:shadow-primary-600/40 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Log Masuk</span>
                                </button>
                            </form>

                            {{-- Footer --}}
                            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                                <p class="text-gray-500 text-sm">
                                    Lupa kata laluan? Sila hubungi pentadbir sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout>
