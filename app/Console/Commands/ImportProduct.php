<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mall\Product;
use Illuminate\Support\Facades\File;
use Michaelwang\Mediable\MediaUploaderFacade as MediaUploader;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class ImportProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Product from csv file';


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
       $file = $this->argument('file');
       $reader = ReaderEntityFactory::createReaderFromFile(storage_path($file));
       $reader->open(storage_path($file));
       foreach ($reader->getSheetIterator() as $sheet) {
           foreach ($sheet->getRowIterator() as $index => $row) {
               // do stuff with the row
               $cells = $row->getCells();
               if($index > 2) {
                    $imageIndex = [3,4,5,6,7,8];
                    $id = $cells[0]->getValue();
                    $catId = $cells[1]->getValue();
                    $name = $cells[2]->getValue();
                    $item = Product::updateOrCreate(['name'=>$name],[
                        'id' => $id,
                        'name' => $name,
                        'description' => $name
                    ]);
                    $dir = 'clothes/'.$item->id;
                    foreach($imageIndex as $key)
                    {
                        $img = $cells[$key]->getValue();
                        if(!empty($img)){
                            $media = MediaUploader::fromSource($img)
                            ->toDestination('public',$dir)
                            ->useHashForFilename()
                            ->upload();;
                            $item->attachMedia($media,'clothes');
                        }
                    }

               }
           }
       }

       $reader->close();



    }


}
