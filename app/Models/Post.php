<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'gallery_images',
        'category_id',
        'author_id',
        'status',
        'is_featured',
        'views_count',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'views_count' => 'integer',
        'published_at' => 'datetime',
        'gallery_images' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            // Convert Featured Image
            if ($post->isDirty('featured_image') && $post->featured_image) {
                $post->featured_image = self::convertToWebp($post->featured_image);
            }

            // Convert Gallery Images
            if ($post->isDirty('gallery_images') && is_array($post->gallery_images)) {
                $newGallery = [];
                foreach ($post->gallery_images as $image) {
                    $newGallery[] = self::convertToWebp($image);
                }
                $post->gallery_images = $newGallery;
            }
        });
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
            // Log error or just return original path
            return $path;
        }
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled')
                     ->where('published_at', '>', now());
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->status === 'published' && $this->published_at <= now();
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }
}
