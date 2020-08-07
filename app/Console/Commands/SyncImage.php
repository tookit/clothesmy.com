<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mall\Product;
use App\Models\Media\Media;
use Exception;

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
            if($item->disk === 'oss') {
                try {
                    $item->getUrl();
                    $item->cloud_url = $item->getUrl();
                    $item->save();
                }catch(Exception $e) {
                    var_dump($item);
                    dd($e);

                }

            }
        });
        $this->info('Proudct image synced');
    }

}
