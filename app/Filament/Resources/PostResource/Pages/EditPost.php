<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['library_images']) && is_array($data['library_images'])) {
            $gallery = $data['gallery_images'] ?? [];
            if (!is_array($gallery)) $gallery = [];
            
            // Merge unique paths
            $data['gallery_images'] = array_values(array_unique(array_merge($gallery, $data['library_images'])));
            
            unset($data['library_images']);
        }

        return $data;
    }
}
