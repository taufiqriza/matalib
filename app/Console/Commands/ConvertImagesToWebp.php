<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:convert-webp';

    protected $description = 'Convert all post images to WebP format';

    public function handle()
    {
        $this->info('Starting conversion...');
        
        $posts = \App\Models\Post::all();
        $bar = $this->output->createProgressBar($posts->count());

        foreach ($posts as $post) {
            $updated = false;

            // Convert Featured Image
            if ($post->featured_image && !str_ends_with(strtolower($post->featured_image), '.webp')) {
                $newPath = $this->convertToWebp($post->featured_image);
                if ($newPath !== $post->featured_image) {
                    $post->featured_image = $newPath;
                    $updated = true;
                }
            }

            // Convert Gallery Images
            if ($post->gallery_images && is_array($post->gallery_images)) {
                $newGallery = [];
                foreach ($post->gallery_images as $image) {
                    if (!str_ends_with(strtolower($image), '.webp')) {
                        $newPath = $this->convertToWebp($image);
                        if ($newPath !== $image) {
                            $updated = true;
                        }
                        $newGallery[] = $newPath;
                    } else {
                        $newGallery[] = $image;
                    }
                }
                if ($updated) {
                    $post->gallery_images = $newGallery;
                }
            }

            if ($updated) {
                // Save without triggering events to prevent double processing if I used the observer logic there too, 
                // but since my observer checks isDirty, it's fine. 
                // However, saveQuietly is safer.
                $post->saveQuietly();
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('All images converted successfully!');
    }

    private function convertToWebp(?string $path): string
    {
        if (!$path) return '';

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
}
