<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncExistingImagesToMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:sync';

    protected $description = 'Scan storage and sync existing images to media library';

    public function handle()
    {
        $this->info('Scanning storage for images...');

        $directories = ['posts', 'posts/gallery', 'media'];
        $disk = \Illuminate\Support\Facades\Storage::disk('public');
        
        $adminId = \App\Models\User::first()->id ?? null;

        foreach ($directories as $directory) {
            $files = $disk->files($directory);
            $this->info("Found " . count($files) . " files in '$directory'. Syncing...");
            
            $bar = $this->output->createProgressBar(count($files));

            foreach ($files as $file) {
                // Skip non-image files
                $mime = $disk->mimeType($file);
                if (!str_starts_with($mime ?? '', 'image/')) {
                    $bar->advance();
                    continue;
                }

                // Check if exists
                if (\App\Models\Media::where('path', $file)->exists()) {
                    $bar->advance();
                    continue;
                }

                // Register
                \App\Models\Media::create([
                    'name' => pathinfo($file, PATHINFO_FILENAME),
                    'file_name' => basename($file),
                    'path' => $file,
                    'disk' => 'public',
                    'mime_type' => $mime,
                    'size' => $disk->size($file),
                    'uploaded_by' => $adminId,
                    'folder' => $directory,
                ]);

                $bar->advance();
            }
            $bar->finish();
            $this->newLine();
        }

        $this->info('Sync completed!');
    }
}
