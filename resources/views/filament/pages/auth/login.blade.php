<x-filament-panels::page.simple>
    @php
        $logo = 'logo-matalib.png';
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $siteTagline = \App\Models\Setting::get('site_tagline', 'Madrasah Tahfiz Al Qur\'an Ibnu Talib');
    @endphp

    <style>
        /* Reset Filament default styles */
        .fi-simple-layout {
            background: transparent !important;
            min-height: 100vh;
        }
        .fi-simple-main {
            width: 100%;
            max-width: 100%;
            padding: 0;
        }
        .fi-simple-main-ctn {
            width: 100%;
            max-width: 100%;
            margin: 0;
        }
        .fi-simple-header {
            display: none !important;
        }

        /* Custom styling */
        body { 
            font-family: 'Inter', sans-serif; 
            margin: 0;
            padding: 0;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Decorative Background Elements */
        .bg-decoration {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        .bg-dec-1 {
            width: 500px;
            height: 500px;
            background: rgba(34, 197, 94, 0.2);
            top: -200px;
            right: -100px;
        }
        .bg-dec-2 {
            width: 400px;
            height: 400px;
            background: rgba(16, 185, 129, 0.15);
            bottom: -150px;
            left: -100px;
        }
        .bg-dec-3 {
            width: 300px;
            height: 300px;
            background: rgba(5, 150, 105, 0.1);
            top: 40%;
            left: 30%;
        }

        /* Left Side - Branding */
        .brand-side {
            flex: 1;
            background: linear-gradient(135deg, #15803d 0%, #166534 50%, #14532d 100%);
            display: none;
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 1024px) {
            .brand-side {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 3rem;
            }
        }
        .brand-side::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .brand-content {
            position: relative;
            z-index: 10;
            max-width: 480px;
            color: white;
        }
        .brand-decoration-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        .brand-circle-1 { width: 300px; height: 300px; top: -100px; right: -100px; }
        .brand-circle-2 { width: 200px; height: 200px; bottom: -50px; left: -50px; }

        /* Right Side - Form */
        .form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            z-index: 10;
        }
        @media (min-width: 640px) {
            .form-side {
                padding: 3rem 2rem;
            }
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.5);
            padding: 2rem;
            width: 100%;
            max-width: 420px;
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 640px) {
            .glass-card {
                padding: 2.5rem;
            }
        }
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
        }

        /* Form Input Overrides */
        .fi-fo-field-wrp {
            margin-bottom: 1rem;
        }
        .fi-input-wrp {
            background-color: #f9fafb !important;
            border: 2px solid #e5e7eb !important;
            border-radius: 0.875rem !important;
            transition: all 0.3s ease !important;
            overflow: hidden;
        }
        .fi-input-wrp:focus-within {
            border-color: #22c55e !important;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1) !important;
            background-color: #fff !important;
        }
        .fi-input {
            padding: 1rem 1.25rem !important;
            font-size: 0.9375rem !important;
        }
        .fi-fo-field-wrp-label {
            font-weight: 600 !important;
            color: #374151 !important;
            margin-bottom: 0.5rem !important;
            font-size: 0.875rem !important;
        }

        /* Submit Button Override */
        .fi-btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%) !important;
            border: none !important;
            border-radius: 0.875rem !important;
            padding: 1rem 1.5rem !important;
            font-weight: 700 !important;
            font-size: 0.9375rem !important;
            box-shadow: 0 4px 14px rgba(34, 197, 94, 0.4) !important;
            transition: all 0.3s ease !important;
        }
        .fi-btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.5) !important;
        }

        /* Arabic Font */
        .arabic-text {
            font-family: 'Amiri', serif;
            direction: rtl;
        }

        /* Feature list */
        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        .feature-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="login-container">
        <!-- Decorative Background -->
        <div class="bg-decoration bg-dec-1"></div>
        <div class="bg-decoration bg-dec-2"></div>
        <div class="bg-decoration bg-dec-3"></div>

        <!-- Left Side - Branding (Desktop Only) -->
        <div class="brand-side">
            <div class="brand-decoration-circle brand-circle-1"></div>
            <div class="brand-decoration-circle brand-circle-2"></div>
            
            <div class="brand-content">
                <!-- Arabic Bismillah -->
                <p class="arabic-text text-2xl text-white/80 mb-6">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium text-white/90 mb-6">
                    <i class="fas fa-mosque"></i>
                    <span>Pusat Tahfiz Terbaik</span>
                </div>
                
                <!-- Heading -->
                <h1 class="text-4xl font-extrabold mb-4">
                    Selamat Datang ke<br>
                    <span class="text-emerald-300">{{ $siteName }}</span>
                </h1>
                <p class="text-white/80 text-lg mb-8">
                    {{ $siteTagline }}
                </p>
                
                <!-- Features -->
                <div class="space-y-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-book-quran text-white"></i>
                        </div>
                        <span class="text-white/90">Program Tahfiz 30 Juz</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-user-graduate text-white"></i>
                        </div>
                        <span class="text-white/90">Guru Hafiz Berpengalaman</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-certificate text-white"></i>
                        </div>
                        <span class="text-white/90">Sijil Tahfiz Diiktiraf</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="form-side">
            <div class="glass-card">
                <!-- Logo & Branding -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <img src="{{ asset('storage/' . $logo) }}" alt="{{ $siteName }}" class="h-14 w-auto">
                        <div class="text-left lg:hidden">
                            <h2 class="text-lg font-bold text-gray-900">{{ $siteName }}</h2>
                            <p class="text-xs text-gray-500">{{ Str::limit($siteTagline, 30) }}</p>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Selamat Kembali!</h2>
                    <p class="text-gray-500 text-sm">Sila log masuk ke akaun anda</p>
                </div>

                <!-- Login Form -->
                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament-panels::form.actions
                        :actions="$this->getCachedFormActions()"
                        :full-width="$this->hasFullWidthFormActions()"
                    />
                </x-filament-panels::form>

                <!-- Footer Links -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-center text-gray-500 text-sm">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-1 text-primary-600 hover:text-primary-700 font-medium">
                            <i class="fas fa-arrow-left text-xs"></i>
                            Kembali ke Laman Utama
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="fixed bottom-4 left-0 right-0 text-center z-10">
        <p class="text-gray-500 text-xs">
            © {{ date('Y') }} {{ $siteName }}. Hak Cipta Terpelihara.
        </p>
    </div>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</x-filament-panels::page.simple>
