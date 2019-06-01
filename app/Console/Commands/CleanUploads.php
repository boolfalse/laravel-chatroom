<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class CleanUploads extends Command
{
    protected $signature = 'cleanuploads';

    protected $description = 'Cleans (faker) uploads.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = new Filesystem;
        $directory = 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . config('custom.user_images_folder');
        $file->cleanDirectory($directory);

        foreach (config('custom.user_image_sizes') as $version => $sizes){
            $directory = 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . config('custom.user_images_folder') . DIRECTORY_SEPARATOR . $version;
            $file->cleanDirectory($directory);
        }

        echo "Uploads successfully deleted!\n";
    }
}
