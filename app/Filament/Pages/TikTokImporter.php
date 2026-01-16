<?php

namespace App\Filament\Pages;

use App\Models\Post;
use App\Models\Category;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Str;

class TikTokImporter extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationLabel = 'Import TikTok';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;
    protected static ?string $title = 'Import Konten TikTok';
    protected static string $view = 'filament.pages.tiktok-importer';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Maklumat Video TikTok')
                    ->description('Masukkan maklumat video TikTok yang ingin diimport sebagai berita')
                    ->icon('heroicon-o-video-camera')
                    ->schema([
                        TextInput::make('tiktok_url')
                            ->label('URL Video TikTok')
                            ->placeholder('https://www.tiktok.com/@tahfizalquranibnutalib/video/...')
                            ->url()
                            ->helperText('Paste URL video TikTok dari profil @tahfizalquranibnutalib'),
                        
                        TextInput::make('title')
                            ->label('Tajuk Berita')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Aktiviti Hafazan Pagi di Matalib')
                            ->helperText('Tajuk yang menarik untuk berita ini'),
                        
                        Textarea::make('video_caption')
                            ->label('Caption Video (Asal)')
                            ->rows(3)
                            ->placeholder('Paste caption video TikTok di sini...')
                            ->helperText('Caption asal dari video TikTok'),
                    ]),

                Section::make('Konten Berita')
                    ->description('Tukar konten video menjadi artikel berita')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->placeholder('Tulis artikel berita berdasarkan video TikTok...')
                            ->helperText('Kembangkan caption video menjadi artikel berita yang lengkap'),
                        
                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(2)
                            ->maxLength(300)
                            ->placeholder('Ringkasan singkat untuk berita ini...')
                            ->helperText('Akan dipaparkan di senarai berita'),
                    ]),

                Section::make('Tetapan')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(2)
                    ->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required(),
                            ])
                            ->createOptionUsing(function (array $data): int {
                                return Category::create([
                                    'name' => $data['name'],
                                    'slug' => Str::slug($data['name']),
                                ])->id;
                            }),
                        
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draf',
                                'published' => 'Diterbitkan',
                                'scheduled' => 'Dijadualkan',
                            ])
                            ->default('draft')
                            ->required(),
                        
                        DateTimePicker::make('published_at')
                            ->label('Tarikh Terbit')
                            ->default(now())
                            ->native(false),
                        
                        Toggle::make('is_featured')
                            ->label('Berita Utama')
                            ->helperText('Paparkan di bahagian utama'),
                        
                        FileUpload::make('featured_image')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('posts')
                            ->imageEditor()
                            ->helperText('Muat naik screenshot atau thumbnail video')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function import(): void
    {
        $data = $this->form->getState();

        // Validate required fields
        if (empty($data['title']) || empty($data['content'])) {
            Notification::make()
                ->title('Ralat')
                ->body('Tajuk dan isi berita diperlukan.')
                ->danger()
                ->send();
            return;
        }

        // Generate slug
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Build content with TikTok embed
        $content = $data['content'];
        
        // Add TikTok reference if URL provided
        if (!empty($data['tiktok_url'])) {
            $content .= "\n\n<p><strong>Sumber:</strong> <a href=\"{$data['tiktok_url']}\" target=\"_blank\">Lihat video asal di TikTok</a></p>";
        }

        // Create post
        $post = Post::create([
            'title' => $data['title'],
            'slug' => $slug,
            'content' => $content,
            'excerpt' => $data['excerpt'] ?? Str::limit(strip_tags($content), 200),
            'featured_image' => $data['featured_image'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'author_id' => auth()->id(),
            'status' => $data['status'] ?? 'draft',
            'is_featured' => $data['is_featured'] ?? false,
            'published_at' => $data['published_at'] ?? now(),
            'meta_title' => $data['title'],
            'meta_description' => $data['excerpt'] ?? Str::limit(strip_tags($content), 160),
        ]);

        Notification::make()
            ->title('Berjaya!')
            ->body("Berita \"{$post->title}\" telah dicipta.")
            ->success()
            ->send();

        // Reset form
        $this->form->fill();

        // Redirect to edit post
        $this->redirect(route('filament.admin.resources.posts.edit', $post));
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
