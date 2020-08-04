<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mall\Product;
use Illuminate\Support\Facades\File;
use App\Models\Mediable\Media;
use App\Models\Media\Media as PlankMedia;

class SyncImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync product images';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Media::all()->each(function($item){
            // $path = pathinfo(($item->getPath()));
            // $data = [
            //     'id'=> $item->id,
            //     'disk' => 'oss',
            //     'directory' => $path['dirname'],
            //     'filename' => $path['filename'],
            //     'extension' => $path['extension'],
            //     'mime_type' => $item->mime_type,
            //     'size' => $item->size,
            //     'uuid'=>$item->uuid,
            //     'aggregate_type' => 'image/jpg'

            // ];
            $plank = PlankMedia::find($item->id);
            $product = Product::find($item->model_id);
            $product->attachMedia($plank,'fiber');
        });

    }

    public function syncFiber() {
        Product::all()->each(function ($item) {
            $files = $this->getFiles($item->getKey());
            if (count($files) > 0) {
                // attach images
                collect($files)->each(function ($file) use($item) {
                    $item->copyMedia($file->getPathname())
                        ->withCustomProperties(['title' => $item->name])
                        ->toMediaCollection('fiber', 'oss');
                    $item->is_active = 1;
                    $item->save();
//                    $this->info(sprintf('item %s image uploaded'), [$item->getKey()]);
                });


            }
        });

    }

    public function getFiles($id)
    {

        $path = storage_path('product/' . $id);
        return (file_exists($path)) ? File::files($path) : [];

    }
}
