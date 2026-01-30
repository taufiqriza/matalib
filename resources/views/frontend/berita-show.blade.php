<x-frontend.layout :title="$post->title">

    {{-- 1. Ultra Compact Hero Background (Mobile First: Native App Feel) --}}
    <section class="absolute top-0 left-0 right-0 h-48 sm:h-64 bg-gradient-to-br from-primary-800 via-primary-700 to-emerald-900 z-0">
        {{-- Decorative Elements (Subtle) --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24 blur-2xl"></div>
    </section>

    {{-- 2. Main Layout --}}
    <section class="relative z-10 pt-20 px-4 pb-24">
        <div class="max-w-7xl mx-auto">
            
            {{-- Breadcrumb (Compact & Clean) --}}
            <nav class="flex items-center gap-2 text-white/90 text-[10px] sm:text-xs mb-4 relative z-10 font-medium overflow-x-auto whitespace-nowrap hide-scrollbar">
                <a href="{{ url('/') }}" class="flex items-center gap-1 active:scale-95 transition">
                    <i class="fas fa-home opacity-80"></i>
                </a>
                <i class="fas fa-chevron-right text-[8px] opacity-60"></i>
                <a href="{{ route('berita') }}" class="active:scale-95 transition">Berita</a>
                <i class="fas fa-chevron-right text-[8px] opacity-60"></i>
                <span class="truncate max-w-[150px] opacity-100 font-semibold">{{ Str::limit($post->title, 20) }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                
                {{-- LEFT COLUMN: Article Content --}}
                <article class="flex-1 min-w-0">
                    
                    {{-- Content Card (Native App Card Style) --}}
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100">
                        
                        {{-- Header Section --}}
                        <div class="p-5 sm:p-8 lg:p-10 pb-0 sm:pb-0 lg:pb-0">
                            {{-- Category Pill --}}
                            @if($post->category)
                            <div class="mb-4">
                                <span class="inline-block px-3 py-1 rounded-full text-[10px] sm:text-xs font-bold tracking-wider uppercase bg-primary-50 text-primary-700 border border-primary-100">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                            @endif

                            {{-- Title --}}
                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                                {{ $post->title }}
                            </h1>

                            {{-- Author Info (Premium Row) --}}
                            <div class="flex items-center justify-between border-t border-b border-gray-100 py-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full p-0.5 bg-gradient-to-tr from-primary-500 to-emerald-400">
                                        <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                                            @if($post->author && $post->author->photo)
                                                <img src="{{ asset('storage/' . $post->author->photo) }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-primary-700 font-bold text-sm">{{ substr($post->author ? $post->author->name : 'A', 0, 1) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-bold text-gray-900">{{ $post->author ? $post->author->name : 'Admin Matalib' }}</h4>
                                        <p class="text-[10px] text-gray-400">{{ $post->published_at?->format('d M Y') }}</p>
                                    </div>
                                </div>
                                
                                {{-- Share Button (Dropdown/Simple on Mobile) --}}
                                <button onclick="navigator.clipboard.writeText(window.location.href); alert('Pautan disalin!')" class="w-8 h-8 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center hover:bg-primary-50 hover:text-primary-600 transition active:scale-95">
                                    <i class="fas fa-share-alt text-sm"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Featured Image (Full Width on Mobile) --}}
                        @if($post->featured_image)
                        <div class="w-full aspect-video sm:rounded-2xl sm:mx-auto sm:w-[calc(100%-2.5rem)] lg:w-[calc(100%-5rem)] overflow-hidden shadow-sm relative group bg-gray-100">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        </div>
                        @if($post->caption)
                        <p class="text-[10px] text-gray-400 text-center mt-2 italic px-4">{{ $post->caption }}</p>
                        @endif
                        @endif

                        {{-- Main Content Body --}}
                        <div class="p-5 sm:p-8 lg:p-10">
                            <div class="prose prose-base sm:prose-lg prose-slate max-w-none
                                prose-headings:font-bold prose-headings:text-gray-900 prose-headings:tracking-tight
                                prose-p:text-gray-600 prose-p:leading-relaxed
                                prose-a:text-primary-600 prose-a:no-underline prose-a:font-semibold
                                prose-img:rounded-2xl prose-img:shadow-lg prose-img:w-full prose-img:border prose-img:border-gray-50
                                prose-blockquote:border-l-4 prose-blockquote:border-primary-500 prose-blockquote:bg-gray-50 prose-blockquote:rounded-r-xl prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:not-italic prose-blockquote:text-gray-700
                                prose-ul:marker:text-primary-500 prose-ol:marker:text-primary-500">
                                {!! $post->content !!}
                            </div>
                        </div>

                        {{-- Author Bio Footer (New Request) --}}
                        <div class="bg-gray-50 p-6 sm:p-8 border-t border-gray-100">
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Mengenai Penulis</h3>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full flex-shrink-0 bg-white border border-gray-200 p-0.5 shadow-sm">
                                    @if($post->author && $post->author->photo)
                                        <img src="{{ asset('storage/' . $post->author->photo) }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                            <i class="fas fa-user text-sm"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $post->author ? $post->author->name : 'Pasukan Berita Matalib' }}</h4>
                                    <p class="text-xs text-gray-500 leading-relaxed mb-3">
                                        Sebahagian daripada pasukan editorial Madrasah Tahfiz Al Qur'an Ibnu Talib, berdedikasi untuk menyampaikan perkembangan terkini dan artikel ilmiah untuk manfaat ummah.
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="#" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-facebook text-xs"></i></a>
                                        <a href="#" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-twitter text-xs"></i></a>
                                        <a href="#" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-instagram text-xs"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    {{-- Social Share Floating (Mobile Bottom) --}}
                    <div class="lg:hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-40 bg-white/90 backdrop-blur-md border border-gray-200 shadow-xl rounded-full px-4 py-2 flex items-center gap-4">
                        <span class="text-[10px] font-bold text-gray-500 uppercase">Kongsi:</span>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" class="text-[#25D366] text-xl active:scale-90 transition"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" class="text-[#1877F2] text-xl active:scale-90 transition"><i class="fab fa-facebook"></i></a>
                        <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link disalin')" class="text-gray-500 text-sm active:scale-90 transition"><i class="fas fa-link"></i></button>
                    </div>

                </article>

                {{-- RIGHT COLUMN: Sidebar --}}
                <aside class="w-full lg:w-80 space-y-5 pb-20 lg:pb-0">
                    
                    {{-- 1. Info Widget --}}
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5">
                         <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm">
                            <i class="fas fa-compass text-primary-500"></i> Pautan Pantas
                        </h3>
                        <div class="space-y-2">
                            <a href="{{ url('/visi-misi') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-gray-50 transition group">
                                <div class="w-8 h-8 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600 text-xs">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-700 group-hover:text-primary-700">Visi & Misi</span>
                            </a>
                            <a href="{{ url('/statistik') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-gray-50 transition group">
                                <div class="w-8 h-8 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600 text-xs">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-700 group-hover:text-primary-700">Statistik</span>
                            </a>
                        </div>
                    </div>

                    {{-- 2. Recent Posts --}}
                    @if($relatedPosts->count())
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm">
                            <i class="fas fa-bolt text-amber-500"></i> Terkini
                        </h3>
                        <div class="space-y-3">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('berita.show', $related->slug) }}" class="flex gap-3 group items-center">
                                <div class="w-14 h-14 rounded-lg overflow-hidden flex-shrink-0 relative">
                                    @if($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                            <i class="fas fa-image text-xs"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-primary-600 transition mb-1">{{ $related->title }}</h4>
                                    <p class="text-[10px] text-gray-400">{{ $related->published_at?->format('d/m/Y') }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </aside>

            </div>
        </div>
    </section>

</x-frontend.layout>
