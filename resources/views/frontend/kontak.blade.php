<x-frontend.layout title="Hubungi Kami">

    @php
        $siteName = \App\Models\Setting::get('site_name', 'Matalib');
        $email = \App\Models\Setting::get('site_email');
        $phone = \App\Models\Setting::get('site_phone');
        $address = \App\Models\Setting::get('site_address');
        $whatsapp = \App\Models\Setting::get('social_whatsapp');
    @endphp

    {{-- Page Header --}}
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-2">Hubungi Kami</h1>
            <p class="text-primary-200">Kami senang mendengar dari Anda</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-2 gap-8">
            
            {{-- Contact Info --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                
                <div class="space-y-4">
                    @if($email)
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-envelope text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Email</h3>
                            <a href="mailto:{{ $email }}" class="text-primary-600 hover:underline">{{ $email }}</a>
                        </div>
                    </div>
                    @endif
                    
                    @if($phone)
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-phone text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Telefon</h3>
                            <a href="tel:{{ $phone }}" class="text-primary-600 hover:underline">{{ $phone }}</a>
                        </div>
                    </div>
                    @endif
                    
                    @if($whatsapp)
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">WhatsApp</h3>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="text-green-600 hover:underline">{{ $whatsapp }}</a>
                        </div>
                    </div>
                    @endif
                    
                    @if($address)
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Alamat</h3>
                            <p class="text-gray-600">{{ $address }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                
                {{-- Quick Contact CTA --}}
                @if($whatsapp)
                <div class="mt-8">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}" target="_blank" class="w-full flex items-center justify-center gap-3 px-6 py-4 bg-green-500 text-white font-semibold rounded-2xl shadow-lg hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp text-2xl"></i>
                        Chat via WhatsApp
                    </a>
                </div>
                @endif
            </div>
            
            {{-- Contact Form --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
                
                <form class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-gray-100 space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition" placeholder="Masukkan nama Anda">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition" placeholder="nama@email.com">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telefon</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition" placeholder="08xxxxxxxxxx">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition">
                            <option value="">Pilih subjek</option>
                            <option value="pendaftaran">Pendaftaran Santri</option>
                            <option value="informasi">Informasi Umum</option>
                            <option value="kerjasama">Kerjasama</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none" placeholder="Tulis pesan Anda..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full px-6 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-frontend.layout>
