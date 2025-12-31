<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $publishedPosts = Post::where('status', 'published')->count();
        $draftPosts = Post::where('status', 'draft')->count();
        $publishedPages = Page::where('status', 'published')->count();

        return [
            Stat::make('Total Posts', Post::count())
                ->description("{$publishedPosts} published, {$draftPosts} drafts")
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 3, 4, 5, 6, 3, 5, 8])
                ->color('success'),

            Stat::make('Total Pages', Page::count())
                ->description("{$publishedPages} published")
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([3, 5, 2, 4, 6, 3, 5])
                ->color('info'),

            Stat::make('Categories', Category::count())
                ->description('Active categories')
                ->descriptionIcon('heroicon-m-folder')
                ->chart([2, 4, 3, 5, 4, 6, 5])
                ->color('warning'),

            Stat::make('Media Files', Media::count())
                ->description($this->formatBytes(Media::sum('size')) . ' used')
                ->descriptionIcon('heroicon-m-photo')
                ->chart([5, 3, 7, 4, 5, 6, 8])
                ->color('gray'),
        ];
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
