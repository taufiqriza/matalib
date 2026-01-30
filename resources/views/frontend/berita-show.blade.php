<x-frontend.layout :title="$post->title">

    {{-- 1. Compact Hero Background --}}
    <section class="absolute top-0 left-0 right-0 h-80 bg-gradient-to-br from-primary-800 via-primary-700 to-emerald-900 overflow-hidden z-0">
        {{-- Decorative Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full -ml-32 -mb-32 blur-3xl"></div>
    </section>

    {{-- 2. Main Layout --}}
    <section class="relative z-10 pt-24 lg:pt-32 pb-24 px-4">
        <div class="max-w-7xl mx-auto">
            
            {{-- Breadcrumb (White Text on Dark Background) --}}
            <nav class="flex items-center gap-2 text-white/80 text-xs sm:text-sm mb-8 font-medium relative z-10">
                <a href="{{ url('/') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fas fa-home opacity-70"></i>
                </a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <a href="{{ route('berita') }}" class="hover:text-white transition">Berita</a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <span class="text-white truncate max-w-[200px]">{{ $post->title }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- LEFT COLUMN: Article Content --}}
                <article class="flex-1 min-w-0">
                    
                    {{-- Article Header Card --}}
                    <div class="bg-white rounded-3xl shadow-xl p-6 lg:p-10 mb-8 border border-gray-100">
                        {{-- Category Badge --}}
                        @if($post->category)
                        <div class="flex justify-center mb-6">
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase bg-primary-50 text-primary-700 border border-primary-100">
                                {{ $post->category->name }}
                            </span>
                        </div>
                        @endif

                        {{-- Title --}}
                        <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-8 text-center tracking-tight">
                            {{ $post->title }}
                        </h1>

                        {{-- Premium Author Info (Centered) --}}
                        <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-gray-500 border-t border-b border-gray-100 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 border border-gray-200">
                                    @if($post->author && $post->author->photo)
                                        <img src="{{ asset('storage/' . $post->author->photo) }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <div class="text-left">
                                    <span class="block font-bold text-gray-900 leading-none">{{ $post->author ? $post->author->name : 'Admin Matalib' }}</span>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-wide">Penulis</span>
                                </div>
                            </div>
                            <div class="w-px h-8 bg-gray-200 hidden sm:block"></div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center">
                                    <i class="far fa-calendar"></i>
                                </div>
                                <div class="text-left">
                                    <span class="block font-bold text-gray-900 leading-none">{{ $post->published_at?->format('d M Y') }}</span>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-wide">Tarikh</span>
                                </div>
                            </div>
                            <div class="w-px h-8 bg-gray-200 hidden sm:block"></div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center">
                                    <i class="far fa-eye"></i>
                                </div>
                                <div class="text-left">
                                    <span class="block font-bold text-gray-900 leading-none">{{ $post->views_count }}</span>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-wide">Bacaan</span>
                                </div>
                            </div>
                        </div>

                        {{-- Featured Image --}}
                        @if($post->featured_image)
                        <div class="mt-8 rounded-2xl overflow-hidden shadow-lg border border-gray-100 relative group">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover transform transition-transform duration-700 hover:scale-[1.02]">
                            @if($post->caption)
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                <p class="text-white text-xs italic text-center">{{ $post->caption }}</p>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>

                    {{-- Excerpt & Content Box --}}
                    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 p-6 lg:p-10 mb-8 border border-gray-100">
                        {{-- Toolbar --}}
                        <div class="flex items-center justify-between mb-8 pb-6 border-b border-gray-100">
                            <div class="flex gap-2">
                                <div class="prose prose-sm">
                                    <p class="text-gray-500 italic">Masa membaca: <span class="font-bold text-gray-900">{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} minit</span></p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 transition"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 transition"><i class="fab fa-facebook-f"></i></a>
                                <button onclick="navigator.clipboard.writeText(window.location.href)" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-600 flex items-center justify-center hover:bg-gray-100 transition"><i class="fas fa-link"></i></button>
                            </div>
                        </div>

                        {{-- Excerpt --}}
                        <div class="bg-primary-50/50 border-l-4 border-primary-500 p-6 mb-8 rounded-r-xl">
                            <p class="text-gray-800 text-lg leading-relaxed italic font-medium opacity-90">
                                {{ Str::limit(strip_tags($post->content), 160) }}
                            </p>
                        </div>

                        {{-- Content --}}
                        <div class="prose prose-lg prose-slate max-w-none
                            prose-headings:text-gray-900 prose-headings:font-bold
                            prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-4
                            prose-a:text-primary-600 hover:prose-a:text-primary-700
                            prose-img:rounded-xl prose-img:shadow-md
                            prose-blockquote:border-l-4 prose-blockquote:border-accent-500 prose-blockquote:bg-gray-50 prose-blockquote:py-4 prose-blockquote:px-5 prose-blockquote:rounded-r-lg prose-blockquote:italic
                            marker:text-primary-500">
                            {!! $post->content !!}
                        </div>

                        {{-- Tags --}}
                        @if($post->tags->count())
                        <div class="mt-10 pt-8 border-t border-gray-100 flex flex-wrap gap-2">
                             @foreach($post->tags as $tag)
                            <a href="#" class="px-3 py-1 bg-gray-50 border border-gray-200 text-gray-500 text-sm rounded-lg hover:border-primary-300 hover:text-primary-600 transition">
                                #{{ $tag->name }}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>

                </article>

                {{-- RIGHT COLUMN: Sidebar --}}
                <aside class="w-full lg:w-80 space-y-6">
                    
                    {{-- 1. Info Widget --}}
                    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 p-6 border border-gray-100">
                         <h3 class="font-bold text-gray-900 mb-5 flex items-center gap-2">
                            <span class="w-1 h-6 bg-primary-500 rounded-full"></span> Informasi Menarik
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ url('/visi-misi') }}" class="group flex items-center gap-4 p-3 rounded-xl bg-gray-50 hover:bg-primary-50 transition border border-transparent hover:border-primary-100">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-primary-500 shadow-sm group-hover:scale-110 transition">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-900 group-hover:text-primary-700">Visi & Misi</h4>
                                    <p class="text-xs text-gray-500">Kenali kami</p>
                                </div>
                            </a>
                            <a href="{{ url('/statistik') }}" class="group flex items-center gap-4 p-3 rounded-xl bg-gray-50 hover:bg-primary-50 transition border border-transparent hover:border-primary-100">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-primary-500 shadow-sm group-hover:scale-110 transition">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-900 group-hover:text-primary-700">Statistik</h4>
                                    <p class="text-xs text-gray-500">Data terkini</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- 2. Recent Posts --}}
                    @if($relatedPosts->count())
                    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-5 flex items-center gap-2">
                            <span class="w-1 h-6 bg-primary-500 rounded-full"></span> Berita Terkini
                        </h3>
                        <div class="space-y-5">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('berita.show', $related->slug) }}" class="group flex gap-4">
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 relative shadow-sm">
                                    @if($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0 flex flex-col justify-center">
                                    <span class="text-[10px] font-bold text-primary-600 uppercase mb-1">{{ $related->category ? $related->category->name : 'Berita' }}</span>
                                    <h4 class="text-sm font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition">{{ $related->title }}</h4>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- 3. CTA --}}
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-800 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-10 -mt-10 blur-2xl group-hover:scale-150 transition duration-700"></div>
                        <h3 class="font-bold text-lg mb-2 relative z-10">Pendaftaran Dibuka!</h3>
                        <p class="text-emerald-100 text-sm mb-6 relative z-10 leading-relaxed">Sertai MATALIB untuk pendidikan Tahfiz Al-Quran berkualiti.</p>
                        <a href="https://wa.me/60192276874" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-white text-emerald-700 rounded-xl text-sm font-bold hover:shadow-lg hover:-translate-y-0.5 transition relative z-10">
                            <i class="fab fa-whatsapp text-lg"></i> Hubungi Kami
                        </a>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</x-frontend.layout>
