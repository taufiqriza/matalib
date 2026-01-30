<x-frontend.layout :title="$post->title">

    {{-- 1. Hero Section (Gradient & Meta) --}}
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-700 to-emerald-900 text-white overflow-hidden pb-32 pt-24 lg:pt-32">
        {{-- Decorative Background Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full -ml-32 -mb-32 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-accent-500/10 rounded-full blur-2xl"></div>

        {{-- Background Image Blur (Ambil dari Featured Image) --}}
        @if($post->featured_image)
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-full object-cover opacity-10 blur-xl scale-110">
            <div class="absolute inset-0 bg-gradient-to-b from-primary-900/50 to-primary-900/90 mix-blend-multiply"></div>
        </div>
        @endif

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-primary-200 text-xs sm:text-sm mb-6 font-medium">
                <a href="{{ url('/') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fas fa-home opacity-70"></i> Utama
                </a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <a href="{{ route('berita') }}" class="hover:text-white transition">Berita</a>
                <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                <span class="text-white/80 truncate max-w-[150px]">{{ $post->title }}</span>
            </nav>

            {{-- Category Badge --}}
            @if($post->category)
            <div class="mb-6">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-lg">
                    {{ $post->category->name }}
                </span>
            </div>
            @endif

            {{-- Title --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-8 drop-shadow-sm">
                {{ $post->title }}
            </h1>

            {{-- Meta Info --}}
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-primary-100">
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-full backdrop-blur-sm border border-white/5">
                    <div class="w-6 h-6 rounded-full bg-accent-500 flex items-center justify-center text-white text-[10px]">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="font-semibold text-white">{{ $post->author ? $post->author->name : 'Admin Matalib' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-calendar opacity-70"></i>
                    <span>{{ $post->published_at?->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-eye opacity-70"></i>
                    <span>{{ $post->views_count }} bacaan</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-clock opacity-70"></i>
                    <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} minit baca</span>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Main Content Section --}}
    <section class="relative z-20 pb-24 -mt-24 px-4">
        <div class="max-w-4xl mx-auto">
            
            {{-- Floating Featured Image --}}
            @if($post->featured_image)
            <div class="relative bg-white rounded-3xl shadow-2xl p-2 lg:p-3 mb-10 overflow-hidden ring-1 ring-black/5 transform transition hover:scale-[1.01] duration-500">
                <div class="aspect-video relative rounded-2xl overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    
                    {{-- Caption Overlay --}}
                    @if($post->caption)
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 pt-12">
                        <p class="text-white/90 text-sm italic text-center">{{ $post->caption }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Content Container --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-primary-900/5 overflow-hidden border border-gray-100">
                
                {{-- Toolbar / Share Top --}}
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex gap-2">
                        <span class="w-3 h-3 rounded-full bg-red-400"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                        <span class="w-3 h-3 rounded-full bg-green-400"></span>
                    </div>
                    <div class="flex gap-3 text-gray-400">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="hover:text-green-600 transition" title="Share ke WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="hover:text-blue-600 transition" title="Share ke Facebook"><i class="fab fa-facebook"></i></a>
                        <button onclick="navigator.clipboard.writeText(window.location.href)" class="hover:text-gray-700 transition" title="Copy Link"><i class="fas fa-link"></i></button>
                    </div>
                </div>

                <div class="p-8 lg:p-12">
                    {{-- Excerpt Box --}}
                    <div class="bg-gradient-to-r from-primary-50 to-transparent border-l-4 border-primary-500 pl-6 py-4 mb-10 rounded-r-xl">
                        <p class="text-lg text-primary-900 font-medium italic leading-relaxed opacity-80">
                            "{{ Str::limit(strip_tags($post->content), 150) }}"
                        </p>
                    </div>

                    {{-- The Article Body --}}
                    <div class="prose prose-lg prose-slate max-w-none
                        prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-gray-900 
                        prose-p:text-gray-600 prose-p:leading-relaxed 
                        prose-a:text-primary-600 prose-a:font-semibold prose-a:no-underline hover:prose-a:underline
                        prose-img:rounded-2xl prose-img:shadow-lg prose-img:my-8 prose-img:border prose-img:border-gray-100
                        prose-blockquote:border-l-4 prose-blockquote:border-accent-500 prose-blockquote:bg-gray-50 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:not-italic prose-blockquote:text-gray-700
                        marker:text-primary-500">
                        {!! $post->content !!}
                    </div>

                    {{-- Tags --}}
                    @if($post->tags->count())
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <i class="fas fa-tags text-primary-400"></i>
                            <span class="text-sm font-bold text-gray-900 tracking-wide uppercase">Topik Berkaitan</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                            <a href="#" class="px-4 py-2 bg-gray-50 border border-gray-200 text-gray-600 text-sm font-medium rounded-lg hover:border-primary-300 hover:text-primary-600 hover:bg-primary-50 transition">
                                #{{ $tag->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Author Box Footer --}}
                <div class="bg-gray-50 p-8 border-t border-gray-100 flex items-center gap-6">
                    <div class="w-16 h-16 rounded-full bg-white border border-gray-200 p-1 flex-shrink-0">
                         <div class="w-full h-full rounded-full bg-primary-100 flex items-center justify-center text-primary-600 text-2xl font-bold">
                            {{ substr($post->author ? $post->author->name : 'A', 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg">Ditulis oleh {{ $post->author ? $post->author->name : 'Admin' }}</h4>
                        <p class="text-gray-500 text-sm mt-1">Pasukan editorial Matalib yang berdedikasi untuk menyampaikan berita terkini madrasah.</p>
                    </div>
                </div>
            </div>
        
            {{-- Related Posts Navigation --}}
            <div class="mt-8 flex justify-between items-center px-4">
                <a href="{{ route('berita') }}" class="group inline-flex items-center gap-3 text-gray-500 hover:text-primary-700 transition">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-gray-200 flex items-center justify-center group-hover:border-primary-300 group-hover:bg-primary-50">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </div>
                    <span class="font-medium text-sm">Kembali ke Berita</span>
                </a>
            </div>

        </div>
    </section>

    {{-- 3. Related Posts Grid --}}
    @if($relatedPosts->count())
    <section class="py-16 bg-gray-50/50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-1 h-8 bg-primary-500 rounded-full"></div>
                <h2 class="text-2xl font-bold text-gray-900">Artikel Menarik Lain</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $related)
                <article class="group relative flex flex-col h-full bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:shadow-primary-900/5 hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-primary-50 text-featured-200">
                                <i class="fas fa-newspaper text-3xl opacity-20"></i>
                            </div>
                        @endif
                        
                        {{-- Date Badge --}}
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-gray-900 shadow-sm border border-gray-100">
                            {{ $related->published_at?->format('d M') }}
                        </div>
                    </div>
                    
                    <div class="flex-1 p-6 flex flex-col">
                        @if($related->category)
                        <div class="mb-3">
                            <span class="text-[10px] font-bold tracking-wider uppercase text-primary-600 bg-primary-50 px-2 py-1 rounded-md">
                                {{ $related->category->name }}
                            </span>
                        </div>
                        @endif
                        
                        <h3 class="font-bold text-lg text-gray-900 mb-3 leading-snug group-hover:text-primary-600 transition line-clamp-2">
                            <a href="{{ route('berita.show', $related->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $related->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-1">
                            {{ Str::limit(strip_tags($related->content), 80) }}
                        </p>
                        
                        <div class="flex items-center text-xs text-gray-400 font-medium pt-4 border-t border-gray-50 mt-auto">
                            <span><i class="far fa-clock mr-1"></i> {{ ceil(str_word_count(strip_tags($related->content)) / 200) }} minit</span>
                            <span class="mx-2">•</span>
                            <span class="text-primary-600 group-hover:translate-x-1 transition-transform inline-flex items-center">
                                Baca <i class="fas fa-chevron-right ml-1 text-[10px]"></i>
                            </span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</x-frontend.layout>
