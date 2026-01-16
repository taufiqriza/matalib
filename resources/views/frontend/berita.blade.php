<x-frontend.layout title="Berita">

    {{-- Page Header --}}
    <section class="relative bg-gradient-to-r from-primary-600 via-primary-700 to-emerald-700 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSI+PGcgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjA1Ij48Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIyIi8+PC9nPjwvZz48L3N2Zz4=')]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 lg:py-20">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-4">
                    <i class="fas fa-newspaper"></i>
                    Berita & Artikel
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-5xl font-extrabold text-white mb-4">Berita Terkini</h1>
                <p class="text-primary-100 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                    Ikuti perkembangan dan berita terkini dari Matalib
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" preserveAspectRatio="none">
                <path d="M0 60L48 55C96 50 192 40 288 35C384 30 480 30 576 32C672 35 768 40 864 42C960 45 1056 45 1152 42C1248 40 1344 35 1392 32L1440 30V60H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    {{-- Featured Post --}}
    @if($posts->count() > 0)
    @php $featured = $posts->first(); @endphp
    <section class="py-8 sm:py-12 bg-gradient-to-b from-primary-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <article class="group relative bg-white rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                <div class="lg:flex">
                    <div class="lg:w-1/2 relative">
                        <div class="aspect-video lg:aspect-auto lg:absolute lg:inset-0 overflow-hidden">
                            @if($featured->featured_image)
                            <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-6xl opacity-30"></i>
                            </div>
                            @endif
                        </div>
                        <span class="absolute top-4 left-4 px-4 py-1.5 bg-primary-600 text-white text-xs font-bold rounded-full shadow-lg">
                            <i class="fas fa-star mr-1"></i> Terkini
                        </span>
                    </div>
                    <div class="lg:w-1/2 p-6 sm:p-8 lg:p-10 flex flex-col justify-center">
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-4">
                            <span class="flex items-center gap-1.5">
                                <i class="far fa-calendar text-primary-500"></i>
                                {{ $featured->published_at?->format('d M Y') }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <i class="far fa-eye text-primary-500"></i>
                                {{ $featured->views_count ?? 0 }} views
                            </span>
                            @if($featured->category)
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-xs font-semibold">
                                {{ $featured->category->name }}
                            </span>
                            @endif
                        </div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors line-clamp-2">
                            {{ $featured->title }}
                        </h2>
                        <p class="text-gray-600 text-sm sm:text-base mb-6 line-clamp-3">
                            {{ $featured->excerpt ?? Str::limit(strip_tags($featured->content), 200) }}
                        </p>
                        <a href="{{ route('berita.show', $featured->slug) }}" class="inline-flex items-center gap-2 text-primary-600 font-bold hover:gap-3 transition-all">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>
    @endif

    {{-- News Grid --}}
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            {{-- Section Title --}}
            <div class="flex items-center justify-between mb-8 lg:mb-12">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">
                    Semua Berita
                </h2>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span>{{ $posts->total() }} artikel</span>
                </div>
            </div>
            
            {{-- Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($posts->skip(1) as $post)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="relative aspect-video overflow-hidden">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-4xl opacity-30"></i>
                        </div>
                        @endif
                        @if($post->category)
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white/95 backdrop-blur-sm text-primary-700 text-xs font-semibold rounded-full shadow-sm">
                            {{ $post->category->name }}
                        </span>
                        @endif
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="far fa-calendar"></i>
                                {{ $post->published_at?->format('d M Y') }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="far fa-eye"></i>
                                {{ $post->views_count ?? 0 }}
                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-primary-600 transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                        </p>
                        <a href="{{ route('berita.show', $post->slug) }}" class="inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:gap-3 transition-all">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-newspaper text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Tiada Berita</h3>
                    <p class="text-gray-500 text-sm max-w-md mx-auto">
                        Berita akan dikemas kini tidak lama lagi
                    </p>
                </div>
                @endforelse
            </div>
            
            {{-- Pagination --}}
            @if($posts->hasPages())
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center gap-1">
                    {{-- Previous --}}
                    @if($posts->onFirstPage())
                    <span class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $posts->previousPageUrl() }}" class="w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-700 flex items-center justify-center hover:bg-primary-50 hover:border-primary-200 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif
                    
                    {{-- Page Numbers --}}
                    @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if($page == $posts->currentPage())
                        <span class="w-10 h-10 rounded-lg bg-primary-600 text-white flex items-center justify-center font-bold shadow-lg">
                            {{ $page }}
                        </span>
                        @else
                        <a href="{{ $url }}" class="w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-700 flex items-center justify-center hover:bg-primary-50 hover:border-primary-200 transition-colors font-medium">
                            {{ $page }}
                        </a>
                        @endif
                    @endforeach
                    
                    {{-- Next --}}
                    @if($posts->hasMorePages())
                    <a href="{{ $posts->nextPageUrl() }}" class="w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-700 flex items-center justify-center hover:bg-primary-50 hover:border-primary-200 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    @else
                    <span class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    @endif
                </nav>
            </div>
            @endif
        </div>
    </section>

</x-frontend.layout>
