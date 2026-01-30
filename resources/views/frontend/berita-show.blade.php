<x-frontend.layout :title="$post->title">

    {{-- 1. Hero Section (Patterned & Data-rich) --}}
    <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-emerald-900 overflow-hidden pb-16 pt-24 lg:pt-32">
        {{-- Elegant Pattern Overlay --}}
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        {{-- Gradient Overlay for readability --}}
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary-900/80"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4">
             {{-- Breadcrumb --}}
             <nav class="flex items-center gap-2 text-primary-200 text-xs sm:text-sm mb-6 font-medium">
                <a href="{{ url('/') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fas fa-home opacity-70"></i>
                </a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <a href="{{ route('berita') }}" class="hover:text-white transition">Berita</a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <span class="text-white/80 truncate max-w-[200px]">{{ $post->title }}</span>
            </nav>

            <div class="lg:max-w-4xl">
                {{-- Category Badge --}}
                @if($post->category)
                <div class="mb-4">
                    <span class="inline-flex items-center px-3 py-1 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full text-[10px] sm:text-xs font-bold tracking-wider uppercase shadow-lg">
                        {{ $post->category->name }}
                    </span>
                </div>
                @endif

                {{-- Title --}}
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6 drop-shadow-sm font-sans tracking-tight">
                    {{ $post->title }}
                </h1>

                {{-- Horizontal Meta Info (Elegant Row) --}}
                <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-primary-100/90 font-medium">
                    {{-- Author --}}
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center border border-white/20">
                            @if($post->author && $post->author->photo)
                                <img src="{{ asset('storage/' . $post->author->photo) }}" class="w-full h-full rounded-full object-cover">
                            @else
                                <span class="text-xs font-bold text-white">{{ substr($post->author ? $post->author->name : 'A', 0, 1) }}</span>
                            @endif
                        </div>
                        <span class="text-white">{{ $post->author ? $post->author->name : 'Admin Matalib' }}</span>
                    </div>

                    {{-- Separator --}}
                    <span class="hidden sm:block w-1 h-1 bg-white/30 rounded-full"></span>

                    {{-- Date --}}
                    <div class="flex items-center gap-2" title="{{ $post->published_at?->format('d F Y') }}">
                        <i class="far fa-calendar text-emerald-300"></i>
                        <span>{{ $post->published_at?->diffForHumans() }}</span>
                    </div>

                    {{-- Views --}}
                    <div class="flex items-center gap-2">
                        <i class="far fa-eye text-blue-300"></i>
                        <span>{{ $post->views_count }} paparan</span>
                    </div>

                    {{-- Read Time --}}
                    <div class="flex items-center gap-2">
                        <i class="far fa-clock text-amber-300"></i>
                        <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} minit baca</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Main Layout --}}
    <section class="relative z-20 pb-24 -mt-10 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- LEFT COLUMN: Article Content --}}
                <article class="flex-1 min-w-0">
                    
                    {{-- Content Card --}}
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100">
                        
                        {{-- Featured Image (Inside Card) --}}
                        @if($post->featured_image)
                        <div class="p-2 sm:p-3">
                            <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-sm relative group bg-gray-100">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @if($post->caption)
                                <div class="absolute bottom-3 left-3 bg-black/50 backdrop-blur-sm px-3 py-1 rounded-lg">
                                    <p class="text-[10px] text-white italic">{{ $post->caption }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        {{-- Spacer if no image to push content down nicely --}}
                        <div class="h-8"></div>
                        @endif

                        {{-- Main Content Body --}}
                        <div class="px-6 sm:px-10 pb-10 pt-4">
                             {{-- Social Share Toolbar (Top of content) --}}
                            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-50">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kandungan Artikel</span>
                                <div class="flex gap-2">
                                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-8 h-8 rounded-full bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-500 hover:text-white transition"><i class="fab fa-whatsapp text-sm"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-facebook-f text-xs"></i></a>
                                    <button onclick="navigator.clipboard.writeText(window.location.href)" class="w-8 h-8 rounded-full bg-gray-50 text-gray-500 flex items-center justify-center hover:bg-gray-600 hover:text-white transition"><i class="fas fa-link text-xs"></i></button>
                                </div>
                            </div>

                            <div class="prose prose-base sm:prose-lg prose-slate max-w-none
                                prose-headings:font-bold prose-headings:text-gray-900 prose-headings:tracking-tight
                                prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-5
                                prose-a:text-primary-600 prose-a:no-underline prose-a:font-semibold hover:prose-a:text-primary-700
                                prose-img:rounded-xl prose-img:shadow-lg prose-img:border prose-img:border-gray-50
                                prose-blockquote:border-l-4 prose-blockquote:border-primary-500 prose-blockquote:bg-gray-50 prose-blockquote:rounded-r-xl prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:not-italic prose-blockquote:text-gray-700
                                marker:text-primary-500">
                                {!! $post->content !!}
                            </div>

                            {{-- Tags --}}
                            @if($post->tags->count())
                            <div class="mt-10 pt-6 border-t border-gray-100">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($post->tags as $tag)
                                    <a href="#" class="px-3 py-1.5 bg-gray-50 border border-gray-100 text-gray-500 text-xs font-medium rounded-lg hover:border-primary-200 hover:text-primary-600 hover:bg-primary-50 transition">
                                        # {{ $tag->name }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>

                            
                            {{-- Image Gallery / Slideshow (With Lightbox) --}}
                            @if($post->gallery_images && count($post->gallery_images) > 0)
                            <div class="mt-8 mb-8" x-data="{ showModal: false, activeImage: '' }">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 px-6 sm:px-10">Galeri Foto</h3>
                                
                                {{-- Scrollable Container (Native App Feel) --}}
                                <div class="flex overflow-x-auto gap-4 px-6 sm:px-10 pb-6 hide-scrollbar snap-x snap-mandatory">
                                    @foreach($post->gallery_images as $image)
                                    <div class="snap-center flex-shrink-0 w-64 sm:w-80 rounded-2xl overflow-hidden shadow-md bg-gray-100 border border-gray-100 relative group cursor-pointer"
                                         @click="showModal = true; activeImage = '{{ asset('storage/' . $image) }}'">
                                        <div class="aspect-[4/3]">
                                            <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition flex items-center justify-center">
                                                <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 transition transform scale-50 group-hover:scale-100"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                {{-- Lightbox Modal --}}
                                <div x-show="showModal" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm p-4"
                                     @click.self="showModal = false"
                                     style="display: none;">
                                    
                                    <div class="relative max-w-5xl w-full max-h-[90vh] flex items-center justify-center">
                                        <button @click="showModal = false" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition">
                                            <i class="fas fa-times text-2xl"></i>
                                        </button>
                                        <img :src="activeImage" class="max-w-full max-h-[85vh] rounded-lg shadow-2xl object-contain">
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- Author Bio Footer --}}
                        <div class="bg-gray-50 p-6 sm:p-10 border-t border-gray-100">
                            <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left">
                                <div class="w-16 h-16 rounded-full bg-white border-2 border-primary-100 p-1 shadow-sm flex-shrink-0">
                                    @if($post->author && $post->author->photo)
                                        <img src="{{ asset('storage/' . $post->author->photo) }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <div class="w-full h-full rounded-full bg-primary-50 flex items-center justify-center text-primary-500 font-bold text-xl">
                                            {{ substr($post->author ? $post->author->name : 'A', 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 mb-2">Ditulis oleh {{ $post->author ? $post->author->name : 'Pasukan Editorial' }}</h4>
                                    <p class="text-sm text-gray-500 leading-relaxed mb-4">
                                        Matalib komited menyebarkan syiar Islam melalui pendidikan Tahfiz Al-Quran yang integratif dan holistik. Ikuti kami untuk perkembangan terkini.
                                    </p>
                                    <a href="{{ route('berita') }}" class="inline-flex items-center text-sm font-bold text-primary-600 hover:text-primary-700">
                                        Lihat artikel lain <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </article>

                {{-- RIGHT COLUMN: Sidebar (Expanded) --}}
                <aside class="w-full lg:w-80 space-y-6">
                    
                    {{-- 1. Kata Hikmah (New Widget) --}}
                    <div class="bg-gradient-to-br from-primary-800 to-emerald-900 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 blur-xl"></div>
                        <i class="fas fa-quote-left text-3xl text-emerald-300 opacity-30 absolute top-4 left-4"></i>
                        <div class="relative z-10 pt-2 text-center">
                            <p class="text-sm italic font-medium leading-relaxed mb-3">
                                "Sebaik-baik kalian adalah orang yang mempelajari Al-Quran dan mengajarkannya."
                            </p>
                            <p class="text-xs text-emerald-200 font-bold uppercase tracking-wider">— Hadis Riwayat Bukhari</p>
                        </div>
                    </div>

                    {{-- 2. Pautan Pantas Widget --}}
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5">
                         <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm border-b border-gray-50 pb-2">
                            <i class="fas fa-compass text-primary-500"></i> Jelajah Matalib
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ url('/visi-misi') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-primary-50 hover:border-primary-100 border border-transparent transition group text-center">
                                <i class="fas fa-bullseye text-primary-500 mb-2 text-lg"></i>
                                <span class="text-[10px] font-bold text-gray-700 group-hover:text-primary-700">Visi & Misi</span>
                            </a>
                            <a href="{{ url('/statistik') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-primary-50 hover:border-primary-100 border border-transparent transition group text-center">
                                <i class="fas fa-chart-pie text-blue-500 mb-2 text-lg"></i>
                                <span class="text-[10px] font-bold text-gray-700 group-hover:text-primary-700">Statistik</span>
                            </a>
                             <a href="{{ url('/galeri') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-primary-50 hover:border-primary-100 border border-transparent transition group text-center">
                                <i class="fas fa-images text-purple-500 mb-2 text-lg"></i>
                                <span class="text-[10px] font-bold text-gray-700 group-hover:text-primary-700">Galeri</span>
                            </a>
                             <a href="{{ url('/kontak') }}" class="flex flex-col items-center justify-center p-3 rounded-xl bg-gray-50 hover:bg-primary-50 hover:border-primary-100 border border-transparent transition group text-center">
                                <i class="fas fa-envelope text-amber-500 mb-2 text-lg"></i>
                                <span class="text-[10px] font-bold text-gray-700 group-hover:text-primary-700">Hubungi</span>
                            </a>
                        </div>
                    </div>

                    {{-- 3. Info Terkini / Recent Posts --}}
                    @if($relatedPosts->count())
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm border-b border-gray-50 pb-2">
                            <i class="fas fa-newspaper text-primary-500"></i> Info Terkini
                        </h3>
                        <div class="space-y-4">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('berita.show', $related->slug) }}" class="flex gap-3 group">
                                <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 relative shadow-sm border border-gray-100">
                                    @if($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                                            <i class="fas fa-image text-sm"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col justify-center">
                                    <h4 class="text-xs font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition mb-1">{{ $related->title }}</h4>
                                    <div class="flex items-center gap-2 text-[10px] text-gray-400">
                                        <i class="far fa-clock text-[9px]"></i> {{ $related->published_at?->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <a href="{{ route('berita') }}" class="block w-full py-2.5 mt-4 text-center text-xs font-bold text-primary-600 bg-primary-50 rounded-xl hover:bg-primary-100 transition">
                            Lihat Arkib Berita
                        </a>
                    </div>
                    @endif

                    {{-- 4. Program Tawaran (Promo Widget) --}}
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5 overflow-hidden relative">
                         <div class="absolute top-0 right-0 w-16 h-16 bg-accent-50 rounded-bl-full -mr-2 -mt-2 z-0"></div>
                         <h3 class="font-bold text-gray-900 mb-2 relative z-10 text-sm">Program Kami</h3>
                         <ul class="space-y-2 relative z-10">
                             <li class="flex items-center gap-2 text-xs text-gray-600">
                                 <i class="fas fa-check-circle text-primary-500"></i> Tahfiz Sepenuh Masa
                             </li>
                             <li class="flex items-center gap-2 text-xs text-gray-600">
                                 <i class="fas fa-check-circle text-primary-500"></i> Kelas Fardu Ain
                             </li>
                             <li class="flex items-center gap-2 text-xs text-gray-600">
                                 <i class="fas fa-check-circle text-primary-500"></i> Aktiviti Sunnah
                             </li>
                         </ul>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</x-frontend.layout>
