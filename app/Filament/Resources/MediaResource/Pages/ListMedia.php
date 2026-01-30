<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('toggle_view')
                ->label(request()->query('view', 'grid') === 'grid' ? 'Switch to List' : 'Switch to Grid')
                ->icon(request()->query('view', 'grid') === 'grid' ? 'heroicon-o-list-bullet' : 'heroicon-o-squares-2x2')
                ->url(function () {
                     $view = request()->query('view', 'grid') === 'grid' ? 'list' : 'grid';
                     return request()->fullUrlWithQuery(['view' => $view]);
                }),
            Actions\CreateAction::make(),
        ];
    }
}
