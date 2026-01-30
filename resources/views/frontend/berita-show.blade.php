<x-frontend.layout :title="$post->title">

    {{-- 1. Hero Section (Gradient & Meta) - Style Perpustakaan --}}
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-700 to-emerald-900 text-white overflow-hidden pb-32 pt-24 lg:pt-32">
        {{-- Decorative Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full -ml-32 -mb-32 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-accent-500/10 rounded-full blur-2xl"></div>

        {{-- Background Image Blur --}}
        @if($post->featured_image)
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-full object-cover opacity-10 blur-xl scale-110">
            <div class="absolute inset-0 bg-gradient-to-b from-primary-900/50 to-primary-900/90 mix-blend-multiply"></div>
        </div>
        @endif

        <div class="relative z-10 max-w-7xl mx-auto px-4 py-8">
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
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    @if($post->category)
                    <span class="px-3 py-1 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full text-xs font-bold tracking-wider uppercase">
                        {{ $post->category->name }}
                    </span>
                    @endif
                     {{-- Future: Featured/Pinned Badges can go here --}}
                </div>

                {{-- Title --}}
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-8 drop-shadow-sm">
                    {{ $post->title }}
                </h1>

                {{-- Author & Meta --}}
                 <div class="flex flex-wrap items-center gap-6 text-primary-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center border border-white/10">
                             <div class="w-full h-full rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold">
                                {{ substr($post->author ? $post->author->name : 'A', 0, 1) }}
                            </div>
                        </div>
                        <div>
                            <p class="text-white font-medium text-sm leading-tight">{{ $post->author ? $post->author->name : 'Admin Matalib' }}</p>
                            <p class="text-[10px] opacity-80 uppercase tracking-wide">Penulis</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-sm bg-white/5 px-3 py-1.5 rounded-lg border border-white/5">
                        <i class="far fa-calendar opacity-70"></i>
                        <span>{{ $post->published_at?->format('d M Y') }}</span>
                    </div>
                    
                    <div class="flex items-center gap-2 text-sm">
                        <i class="far fa-eye opacity-70"></i>
                        <span>{{ $post->views_count }}</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm">
                        <i class="far fa-clock opacity-70"></i>
                        <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Main Layout: Content + Sidebar --}}
    <section class="relative z-20 pb-24 -mt-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- LEFT COLUMN: Article Content --}}
                <article class="flex-1 min-w-0">
                    
                    {{-- Featured Image Box --}}
                    @if($post->featured_image)
                    <div class="mb-8 relative z-20">
                         <div class="aspect-video bg-white rounded-2xl shadow-2xl overflow-hidden ring-4 ring-white">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>
                        @if($post->caption)
                        <div class="mt-2 text-center">
                            <p class="text-xs text-white/80 bg-black/50 inline-block px-3 py-1 rounded-full backdrop-blur-sm">{{ $post->caption }}</p>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- Excerpt --}}
                     <div class="bg-gradient-to-r from-primary-50 to-emerald-50 border-l-4 border-primary-500 rounded-r-xl p-6 mb-8 shadow-sm">
                        <p class="text-gray-800 text-lg leading-relaxed italic font-medium">
                            {{ Str::limit(strip_tags($post->content), 160) }}
                        </p>
                    </div>

                    {{-- Content Body --}}
                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/50 p-6 lg:p-10 mb-8 border border-gray-100">
                        <div class="prose prose-lg prose-slate max-w-none
                            prose-headings:text-gray-900 prose-headings:font-bold
                            prose-h2:text-2xl prose-h2:mt-8 prose-h2:mb-4 prose-h2:pb-2 prose-h2:border-b prose-h2:border-gray-100
                            prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-4
                            prose-a:text-primary-600 prose-a:font-semibold prose-a:no-underline hover:prose-a:underline
                            prose-img:rounded-xl prose-img:shadow-lg prose-img:border prose-img:border-gray-50
                            prose-blockquote:border-l-4 prose-blockquote:border-primary-500 prose-blockquote:bg-gray-50 prose-blockquote:rounded-r-xl prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:italic
                            marker:text-primary-500">
                            {!! $post->content !!}
                        </div>
                    </div>

                    {{-- Tags & Share --}}
                    <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/50 p-6 border border-gray-100 mb-8 lg:mb-0">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                             {{-- Tags --}}
                            <div class="flex-1">
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Topik Berkaitan:</span>
                                <div class="flex flex-wrap gap-2">
                                     @if($post->category)
                                    <a href="{{ route('berita') }}" class="px-3 py-1 bg-primary-50 text-primary-700 rounded-lg text-sm font-medium hover:bg-primary-100 transition">
                                        {{ $post->category->name }}
                                    </a>
                                    @endif
                                    @foreach($post->tags as $tag)
                                    <span class="px-3 py-1 bg-gray-50 text-gray-600 rounded-lg text-sm border border-gray-100">
                                        #{{ $tag->name }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Share --}}
                            <div>
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 sm:text-right">Kongsikan:</span>
                                <div class="flex items-center gap-2">
                                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-[#25D366] text-white rounded-xl flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition shadow-sm">
                                        <i class="fab fa-whatsapp text-lg"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-[#1877F2] text-white rounded-xl flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition shadow-sm">
                                        <i class="fab fa-facebook-f text-lg"></i>
                                    </a>
                                    <button onclick="navigator.clipboard.writeText(window.location.href)" class="w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-gray-200 transition shadow-sm">
                                        <i class="fas fa-link"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>

                {{-- RIGHT COLUMN: Sidebar (Recent Post & Info) --}}
                <aside class="w-full lg:w-80 space-y-6 lg:mt-16">
                    
                    {{-- 1. Related Information / Links (Info Menarik) --}}
                    <div class="bg-white rounded-2xl shadow-lg p-5 border border-gray-100">
                         <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 pb-3 border-b border-gray-100">
                            <i class="fas fa-info-circle text-primary-500"></i> Informasi Menarik
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ url('/visi-misi') }}" class="block p-3 bg-gray-50 rounded-xl hover:bg-primary-50 group transition border border-transparent hover:border-primary-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm text-primary-500 group-hover:bg-primary-500 group-hover:text-white transition">
                                        <i class="fas fa-bullseye"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xs text-gray-800 group-hover:text-primary-700 transition">Visi & Misi</h4>
                                        <p class="text-[10px] text-gray-500">Hala tuju madrasah</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/statistik') }}" class="block p-3 bg-gray-50 rounded-xl hover:bg-primary-50 group transition border border-transparent hover:border-primary-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm text-primary-500 group-hover:bg-primary-500 group-hover:text-white transition">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xs text-gray-800 group-hover:text-primary-700 transition">Statistik Terkini</h4>
                                        <p class="text-[10px] text-gray-500">Data pelajar & guru</p>
                                    </div>
                                </div>
                            </a>
                             <a href="{{ url('/galeri') }}" class="block p-3 bg-gray-50 rounded-xl hover:bg-primary-50 group transition border border-transparent hover:border-primary-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm text-primary-500 group-hover:bg-primary-500 group-hover:text-white transition">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xs text-gray-800 group-hover:text-primary-700 transition">Galeri Foto</h4>
                                        <p class="text-[10px] text-gray-500">Aktiviti madrasah</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- 2. Recent Posts Widget --}}
                    @if($relatedPosts->count())
                    <div class="bg-white rounded-2xl shadow-lg p-5 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 pb-3 border-b border-gray-100">
                            <i class="fas fa-newspaper text-primary-500"></i> Berita Terkini
                        </h3>
                        <div class="space-y-4">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('berita.show', $related->slug) }}" class="flex gap-3 group">
                                <div class="w-20 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0 relative">
                                    @if($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0 py-0.5">
                                    <h4 class="text-xs font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition mb-1">{{ $related->title }}</h4>
                                    <p class="text-[10px] text-gray-400">{{ $related->published_at?->format('d M Y') }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <a href="{{ route('berita') }}" class="block w-full py-2.5 mt-4 text-center text-xs font-bold text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                            Lihat Semua Berita
                        </a>
                    </div>
                    @endif

                    {{-- 3. Contact CTA --}}
                    <div class="bg-gradient-to-br from-primary-600 to-emerald-700 rounded-2xl p-5 text-white shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12 blur-xl"></div>
                        <h3 class="font-bold mb-2 relative z-10">Pendaftaran Dibuka!</h3>
                        <p class="text-primary-100 text-xs mb-4 relative z-10 leading-relaxed">Sertai keluarga besar MATALIB untuk melahirkan generasi Al-Quran.</p>
                        <a href="https://wa.me/60192276874" target="_blank" class="block w-full py-2.5 bg-white text-primary-700 text-center rounded-xl text-xs font-bold hover:bg-primary-50 transition shadow-sm relative z-10">
                            <i class="fab fa-whatsapp mr-1"></i> Hubungi Kami
                        </a>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</x-frontend.layout>
