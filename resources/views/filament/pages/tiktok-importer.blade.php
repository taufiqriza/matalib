<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Header Info --}}
        <div class="p-6 bg-gradient-to-r from-primary-500 to-primary-600 rounded-xl text-white">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center">
                    <x-heroicon-o-video-camera class="w-8 h-8" />
                </div>
                <div>
                    <h2 class="text-xl font-bold">Import Konten TikTok</h2>
                    <p class="text-primary-100 text-sm">Tukar video TikTok @tahfizalquranibnutalib menjadi berita website</p>
                </div>
            </div>
        </div>

        {{-- Instructions --}}
        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl">
            <div class="flex items-start gap-3">
                <x-heroicon-o-information-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" />
                <div class="text-sm text-blue-800 dark:text-blue-200">
                    <p class="font-semibold mb-1">Cara Menggunakan:</p>
                    <ol class="list-decimal list-inside space-y-1 text-blue-700 dark:text-blue-300">
                        <li>Buka video TikTok yang ingin diimport</li>
                        <li>Copy URL dan caption video</li>
                        <li>Paste di form di bawah</li>
                        <li>Tulis semula caption menjadi artikel berita yang lengkap</li>
                        <li>Muat naik screenshot/thumbnail sebagai gambar utama</li>
                        <li>Klik "Import Sebagai Berita"</li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- TikTok Account Info --}}
        <div class="p-4 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-900 dark:text-white">@tahfizalquranibnutalib</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Akaun TikTok Rasmi Matalib</p>
                </div>
                <a href="https://www.tiktok.com/@tahfizalquranibnutalib" target="_blank" 
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium flex items-center gap-2">
                    <x-heroicon-o-arrow-top-right-on-square class="w-4 h-4" />
                    Buka TikTok
                </a>
            </div>
        </div>

        {{-- Form --}}
        <form wire:submit="import">
            {{ $this->form }}

            <div class="mt-6 flex items-center gap-3">
                <x-filament::button type="submit" size="lg">
                    <x-heroicon-o-arrow-down-tray class="w-5 h-5 mr-2" />
                    Import Sebagai Berita
                </x-filament::button>
                
                <x-filament::button type="button" color="gray" wire:click="$refresh">
                    <x-heroicon-o-arrow-path class="w-5 h-5 mr-2" />
                    Reset
                </x-filament::button>
            </div>
        </form>

        {{-- Recent Imports --}}
        @php
            $recentPosts = \App\Models\Post::where('content', 'like', '%tiktok.com%')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        @endphp
        
        @if($recentPosts->count() > 0)
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Import Terkini</h3>
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($recentPosts as $post)
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-12 h-12 rounded-lg object-cover" alt="">
                        @else
                        <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-photo class="w-6 h-6 text-gray-400" />
                        </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">{{ Str::limit($post->title, 50) }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 text-xs rounded-full {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $post->status === 'published' ? 'Diterbitkan' : 'Draf' }}
                        </span>
                        <a href="{{ route('filament.admin.resources.posts.edit', $post) }}" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                            <x-heroicon-o-pencil-square class="w-4 h-4 text-gray-500" />
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</x-filament-panels::page>
