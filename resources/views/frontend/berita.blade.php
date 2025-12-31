<x-frontend.layout title="Berita">

    {{-- Page Header --}}
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 py-8 sm:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-2">Berita & Artikel</h1>
            <p class="text-primary-200 text-sm sm:text-base">Berita terkini dari Matalib</p>
        </div>
    </section>

    {{-- Breadcrumb --}}
    <div class="max-w-7xl mx-auto px-4 py-3 sm:py-4">
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-gray-500">
            <a href="{{ url('/') }}" class="hover:text-primary-600">Laman Utama</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900">Berita</span>
        </nav>
    </div>

    {{-- News Grid --}}
    <section class="max-w-7xl mx-auto px-4 pb-10 sm:pb-12 lg:pb-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @forelse($posts as $post)
            <article class="bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                @if($post->featured_image)
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                @else
                <div class="aspect-video bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                    <i class="fas fa-newspaper text-white text-3xl sm:text-4xl opacity-50"></i>
                </div>
                @endif
                <div class="p-4 sm:p-5">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                        <span><i class="far fa-calendar mr-1"></i> {{ $post->published_at?->format('d M Y') }}</span>
                        @if($post->category)
                        <span class="px-2 py-0.5 bg-primary-100 text-primary-700 rounded-full">{{ $post->category->name }}</span>
                        @endif
                    </div>
                    <h3 class="font-bold text-base sm:text-lg text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                    <a href="{{ route('berita.show', $post->slug) }}" class="inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                        Baca Lagi <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-12 sm:py-16">
                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-newspaper text-gray-400 text-3xl sm:text-4xl"></i>
                </div>
                <h3 class="font-bold text-lg sm:text-xl text-gray-900 mb-2">Tiada Berita</h3>
                <p class="text-gray-500 text-sm">Berita akan dikemas kini tidak lama lagi</p>
            </div>
            @endforelse
        </div>
        
        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-6 sm:mt-8">
            {{ $posts->links() }}
        </div>
        @endif
    </section>

</x-frontend.layout>
