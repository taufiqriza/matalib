<x-frontend.layout :title="$post->title">

    {{-- Article Header --}}
    <article>
        @if($post->featured_image)
        <div class="relative h-64 lg:h-96 overflow-hidden">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
        </div>
        @endif

        <div class="max-w-4xl mx-auto px-4 -mt-20 relative z-10">
            <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-10">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                    <a href="{{ url('/') }}" class="hover:text-primary-600">Beranda</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <a href="{{ route('berita') }}" class="hover:text-primary-600">Berita</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-gray-900 truncate max-w-[200px]">{{ $post->title }}</span>
                </nav>

                {{-- Meta --}}
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-4">
                    <span><i class="far fa-calendar mr-1"></i> {{ $post->published_at?->format('d F Y') }}</span>
                    <span><i class="far fa-eye mr-1"></i> {{ $post->views_count }} views</span>
                    @if($post->author)
                    <span><i class="far fa-user mr-1"></i> {{ $post->author->name }}</span>
                    @endif
                    @if($post->category)
                    <span class="px-3 py-1 bg-primary-100 text-primary-700 rounded-full font-medium">{{ $post->category->name }}</span>
                    @endif
                </div>

                {{-- Title --}}
                <h1 class="text-2xl lg:text-4xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>

                {{-- Content --}}
                <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-a:text-primary-600">
                    {!! $post->content !!}
                </div>

                {{-- Tags --}}
                @if($post->tags->count())
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Share --}}
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="font-semibold text-gray-900 mb-3">Bagikan artikel ini:</p>
                    <div class="flex gap-3">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-xl flex items-center justify-center hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-xl flex items-center justify-center hover:bg-sky-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Posts --}}
        @if($relatedPosts->count())
        <section class="max-w-7xl mx-auto px-4 py-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Artikel Terkait</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                    @if($related->featured_image)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-3xl opacity-50"></i>
                    </div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition">{{ $related->title }}</h3>
                        <a href="{{ route('berita.show', $related->slug) }}" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        @endif
    </article>

</x-frontend.layout>
