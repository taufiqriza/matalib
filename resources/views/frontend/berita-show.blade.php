<x-frontend.layout :title="$post->title">

    <article class="pt-8 pb-16 lg:pt-16 lg:pb-24">
        {{-- Header Section: Title & Meta --}}
        <div class="max-w-3xl mx-auto px-4 text-center mb-8 lg:mb-12">
            {{-- Category Badge --}}
            @if($post->category)
            <div class="flex justify-center mb-6">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase bg-primary-50 text-primary-700 border border-primary-100">
                    {{ $post->category->name }}
                </span>
            </div>
            @endif

            {{-- Main Title --}}
            <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                {{ $post->title }}
            </h1>

            {{-- Author & Meta --}}
            <div class="flex items-center justify-center gap-6 text-sm text-gray-500 border-t border-b border-gray-100 py-4 mt-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="font-medium text-gray-900">{{ $post->author ? $post->author->name : 'Admin' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-calendar text-gray-400"></i>
                    <span>{{ $post->published_at?->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="far fa-eye text-gray-400"></i>
                    <span>{{ $post->views_count }} bacaan</span>
                </div>
            </div>
        </div>

        {{-- Featured Image (Ultra Premium Clean View) --}}
        @if($post->featured_image)
        <div class="max-w-5xl mx-auto px-4 mb-12 lg:mb-16">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                {{-- Glass Reflection Effect --}}
                <div class="absolute inset-0 bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-auto object-cover transform transition-transform duration-700 hover:scale-[1.02]">
            </div>
            @if($post->caption)
            <p class="text-center text-sm text-gray-500 mt-3 italic">{{ $post->caption }}</p>
            @endif
        </div>
        @endif

        {{-- Main Content --}}
        <div class="max-w-3xl mx-auto px-4">
            {{-- Breadcrumb (Subtle) --}}
            <nav class="flex items-center gap-2 text-xs text-gray-400 mb-8 border-b border-gray-50 pb-4">
                <a href="{{ url('/') }}" class="hover:text-primary-600 transition">Utama</a>
                <span class="text-gray-300">/</span>
                <a href="{{ route('berita') }}" class="hover:text-primary-600 transition">Berita</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-600 truncate max-w-[150px]">{{ $post->title }}</span>
            </nav>

            {{-- The Content --}}
            <div class="prose prose-lg prose-slate max-w-none 
                prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-gray-900 
                prose-p:text-gray-600 prose-p:leading-relaxed 
                prose-a:text-primary-600 prose-a:no-underline prose-a:border-b prose-a:border-primary-200 hover:prose-a:border-primary-600 hover:prose-a:text-primary-700
                prose-img:rounded-2xl prose-img:shadow-lg prose-img:my-8
                prose-blockquote:border-l-4 prose-blockquote:border-primary-500 prose-blockquote:bg-gray-50 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:not-italic
                mb-12">
                {!! $post->content !!}
            </div>

            {{-- Tags --}}
            @if($post->tags->count())
            <div class="flex flex-wrap gap-2 mb-10">
                @foreach($post->tags as $tag)
                <a href="#" class="px-3 py-1 bg-white border border-gray-200 text-gray-600 text-sm rounded-lg hover:border-primary-300 hover:text-primary-600 transition shadow-sm">
                    #{{ $tag->name }}
                </a>
                @endforeach
            </div>
            @endif

            {{-- Share & Navigation --}}
            <div class="bg-gray-50 rounded-2xl p-6 lg:p-8 border border-gray-100 mb-16">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Suka artikel ini?</h3>
                        <p class="text-sm text-gray-500">Kongsi dengan rakan dan keluarga anda.</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-[#25D366] text-white rounded-full flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-[#1877F2] text-white rounded-full flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-[#1DA1F2] text-white rounded-full flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href)" class="w-10 h-10 bg-gray-800 text-white rounded-full flex items-center justify-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <i class="fas fa-link text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>

    {{-- Related Posts Section --}}
    @if($relatedPosts->count())
    <section class="bg-gray-50 py-16 lg:py-24 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Artikel Berkaitan</h2>
                    <p class="text-gray-500">Bacaan menarik lain untuk anda</p>
                </div>
                <a href="{{ route('berita') }}" class="hidden md:inline-flex items-center text-primary-600 font-medium hover:text-primary-700 transition">
                    Lihat Semua <i class="fas fa-arrow-right ml-2 opacity-70"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $related)
                <article class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <a href="{{ route('berita.show', $related->slug) }}" class="block relative aspect-[4/3] overflow-hidden">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-gray-300"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            @if($related->category)
                            <span class="inline-block px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-bold text-gray-900 rounded-lg shadow-sm">
                                {{ $related->category->name }}
                            </span>
                            @endif
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
                            <span><i class="far fa-calendar mr-1"></i> {{ $related->published_at?->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 leading-snug group-hover:text-primary-600 transition">
                            <a href="{{ route('berita.show', $related->slug) }}">
                                {{ $related->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                            {{ Str::limit(strip_tags($related->content), 100) }}
                        </p>
                        <a href="{{ route('berita.show', $related->slug) }}" class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                            Baca Lanjut <i class="fas fa-chevron-right ml-1 text-xs mt-0.5"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('berita') }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-white border border-gray-200 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </section>
    @endif

</x-frontend.layout>
