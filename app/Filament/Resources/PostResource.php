<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Post Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                    ),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->rules(['alpha_dash']),

                                Forms\Components\RichEditor::make('content')
                                    ->columnSpanFull()
                                    ->fileAttachmentsDirectory('posts'),

                                Forms\Components\Textarea::make('excerpt')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->helperText('Brief summary of the post'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(60)
                                    ->helperText('Max 60 characters'),

                                Forms\Components\Textarea::make('meta_description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText('Max 160 characters'),
                            ])
                            ->columns(2)
                            ->collapsed(),

                        Forms\Components\Section::make('Image Gallery')
                            ->schema([
                                Forms\Components\FileUpload::make('gallery_images')
                                    ->label('Gallery Images')
                                    ->image()
                                    ->directory('posts/gallery')
                                    ->multiple()
                                    ->reorderable()
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('4:3')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('900')
                                    ->maxSize(10240) // Allow up to 10MB upload, but it will be compressed
                                    ->columnSpanFull()
                                    ->helperText('Upload multiple images. They will be automatically compressed and optimized.'),
                            ])
                            ->collapsed(),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                        'scheduled' => 'Scheduled',
                                    ])
                                    ->default('draft')
                                    ->required()
                                    ->live(),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->default(now())
                                    ->required(),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Post')
                                    ->helperText('Show in featured section'),
                            ]),

                        Forms\Components\Section::make('Associations')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('slug')
                                            ->required(),
                                    ]),

                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('slug')
                                            ->required(),
                                    ]),

                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->default(fn () => auth()->id())
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                            ]),

                        Forms\Components\Section::make('Featured Image')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->directory('posts')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Post $record) => Str::limit($record->excerpt, 50))
                    ->wrap()
                    ->weight('bold')
                    ->extraAttributes(['style' => 'min-width: 350px;']),

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'published',
                        'info' => 'scheduled',
                    ]),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                Tables\Columns\TextColumn::make('views_count')
                    ->label('Views')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'scheduled' => 'Scheduled',
                    ]),

                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),

                Tables\Filters\SelectFilter::make('author')
                    ->relationship('author', 'name'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
