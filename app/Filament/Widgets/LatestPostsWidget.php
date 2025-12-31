<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Str;

class LatestPostsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Posts';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->circular()
                    ->label(''),

                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Post $record) => Str::limit($record->excerpt, 60))
                    ->searchable(),

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author'),

                Tables\Columns\TextColumn::make('category.name')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'published',
                        'info' => 'scheduled',
                    ]),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->url(fn (Post $record): string => route('filament.admin.resources.posts.edit', $record))
                    ->icon('heroicon-m-pencil-square'),
            ])
            ->paginated(false);
    }
}
