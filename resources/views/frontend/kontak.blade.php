<x-frontend.layout title="Hubungi Kami">

    @php
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $email = \App\Models\Setting::get('site_email');
        $phone = \App\Models\Setting::get('site_phone', '+60 19-227 6874');
        $address = \App\Models\Setting::get('site_address', 'Km16, Jalan Nekmat, Kampung Pulai, 77300 Merlimau, Melaka');
        $whatsapp = \App\Models\Setting::get('social_whatsapp');
    @endphp

    {{-- Page Header --}}
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-8 sm:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-2">Hubungi Kami</h1>
            <p class="text-primary-200 text-sm sm:text-base">Kami sedia membantu anda</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="max-w-6xl mx-auto px-4 py-8 sm:py-12 lg:py-16">
        <div class="grid lg:grid-cols-2 gap-6 lg:gap-8">
            
            {{-- Contact Info --}}
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">Maklumat Hubungan</h2>
                
                <div class="space-y-3 sm:space-y-4">
                    @if($phone)
                    <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-phone text-primary-600 text-base sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Telefon</h3>
                            <a href="tel:{{ $phone }}" class="text-primary-600 hover:underline text-sm sm:text-base">{{ $phone }}</a>
                        </div>
                    </div>
                    @endif
                    
                    @if($email)
                    <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-envelope text-primary-600 text-base sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">E-mel</h3>
                            <a href="mailto:{{ $email }}" class="text-primary-600 hover:underline text-sm sm:text-base break-all">{{ $email }}</a>
                        </div>
                    </div>
                    @endif
                    
                    <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fab fa-whatsapp text-green-600 text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">WhatsApp</h3>
                            <div class="space-y-1">
                                <a href="https://wa.me/60192276874" class="text-green-600 hover:underline text-sm sm:text-base block">Mohd Ali: +60 19-227 6874</a>
                                <a href="https://wa.me/60105596218" class="text-green-600 hover:underline text-sm sm:text-base block">Ustaz Ahmad: +60 10-559 6218</a>
                            </div>
                        </div>
                    </div>
                    
                    @if($address)
                    <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-5 shadow-sm border border-gray-100 flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt text-primary-600 text-base sm:text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Alamat</h3>
                            <p class="text-gray-600 text-sm sm:text-base">{{ $address }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                
                {{-- Quick Contact CTA --}}
                <div class="mt-6 sm:mt-8">
                    <a href="https://wa.me/60192276874" target="_blank" class="w-full flex items-center justify-center gap-3 px-5 py-3 sm:px-6 sm:py-4 bg-green-500 text-white font-semibold rounded-xl sm:rounded-2xl shadow-lg hover:bg-green-600 transition text-sm sm:text-base">
                        <i class="fab fa-whatsapp text-xl sm:text-2xl"></i>
                        Chat via WhatsApp
                    </a>
                </div>
            </div>
            
            {{-- Contact Form --}}
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6">Hantar Mesej</h2>
                
                <form class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 lg:p-8 shadow-sm border border-gray-100 space-y-4 sm:space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">Nama Penuh</label>
                        <input type="text" id="name" name="name" required class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition text-sm sm:text-base" placeholder="Masukkan nama anda">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">E-mel</label>
                        <input type="email" id="email" name="email" required class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition text-sm sm:text-base" placeholder="nama@email.com">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">No. Telefon</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition text-sm sm:text-base" placeholder="01xxxxxxxxx">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">Subjek</label>
                        <select id="subject" name="subject" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition text-sm sm:text-base">
                            <option value="">Pilih subjek</option>
                            <option value="pendaftaran">Pendaftaran Pelajar</option>
                            <option value="maklumat">Maklumat Am</option>
                            <option value="kerjasama">Kerjasama</option>
                            <option value="lain">Lain-lain</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">Mesej</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none text-sm sm:text-base" placeholder="Tulis mesej anda..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full px-5 py-3 sm:px-6 sm:py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition flex items-center justify-center gap-2 text-sm sm:text-base">
                        <i class="fas fa-paper-plane"></i>
                        Hantar Mesej
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-frontend.layout>
