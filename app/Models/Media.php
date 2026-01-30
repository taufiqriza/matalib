<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_name',
        'path',
        'disk',
        'mime_type',
        'size',
        'alt_text',
        'caption',
        'folder',
        'uploaded_by',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Media $media) {
            if ($media->isDirty('path') && $media->path) {
                // If it's an image, convert to WebP
                if (self::isImage($media->path)) {
                    $media->path = self::convertToWebp($media->path);
                    
                    // Update metadata
                    $disk = Storage::disk($media->disk ?? 'public');
                    if ($disk->exists($media->path)) {
                        $media->mime_type = $disk->mimeType($media->path);
                        $media->size = $disk->size($media->path);
                        $media->file_name = basename($media->path);
                        
                        // Ensure ext is correct in file_name if not updated
                        if (!str_ends_with(strtolower($media->file_name), '.webp')) {
                             $media->file_name = preg_replace('/\.(jpg|jpeg|png|gif)$/i', '.webp', $media->file_name);
                        }
                    }
                }
            }
        });
    }

    private static function isImage($path)
    {
        $mime = Storage::disk('public')->mimeType($path);
        return str_starts_with($mime ?? '', 'image/');
    }

    private static function convertToWebp(?string $path): string
    {
        if (!$path || str_ends_with(strtolower($path), '.webp')) {
            return $path ?? '';
        }

        $disk = \Illuminate\Support\Facades\Storage::disk('public');
        
        if (!$disk->exists($path)) {
            return $path;
        }

        try {
            $content = $disk->get($path);
            $image = @imagecreatefromstring($content);
            if (!$image) return $path;

            // Handle transparency for PNG
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);

            $newPath = preg_replace('/\.(jpg|jpeg|png|gif)$/i', '.webp', $path);
            
            // Output to buffer
            ob_start();
            imagewebp($image, null, 80); // Quality 80
            $webpData = ob_get_contents();
            ob_end_clean();
            
            imagedestroy($image);

            // Save new file
            $disk->put($newPath, $webpData);
            
            // Delete old file if different
            if ($path !== $newPath) {
                $disk->delete($path);
            }

            return $newPath;
        } catch (\Exception $e) {
            return $path;
        }
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    public function getHumanSizeAttribute(): string
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getIsImageAttribute(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }

    public function scopeImages($query)
    {
        return $query->where('mime_type', 'like', 'image/%');
    }

    public function scopeInFolder($query, ?string $folder)
    {
        return $query->where('folder', $folder);
    }
}
