<?php

namespace App\Console\Commands;

use App\Models\Mall\Category;
use App\Models\Mall\Property;
use App\Models\Mall\Spec;
use Illuminate\Console\Command;
use App\Models\Mall\Product;
use Illuminate\Support\Facades\File;
use App\Lib\CartesianIterator;
use Illuminate\Support\Facades\Hash;
class SyncProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:sync {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync product, update product field/log uncategorized items';


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
        $action = $this->argument('action') ?? 'meta';
        switch ($action) {
            case 'meta':
                # code...
                $this->syncMeta();
                break;
            case 'image':
                # code...
                $this->syncFeaturedImage();
                break;
            case 'category':
                # code...
                $this->syncCategories();
                break;
            case 'prop':
                # code...
                $this->syncProps();
                break;
            case 'spec':
                # code...
                $this->syncSpec();
                break;
            default:
                # code...
                break;
        }


    }

    public function syncFeaturedImage()
    {
        Product::all()->each(function ($item) {
            if ($item->hasMedia('fiber')) {
                $item->featured_img = $item->getFirstMediaUrl('fiber');
                $item->save();
            }
        });

    }
    public function syncCategories()
    {
        Product::all()->each(function ($item) {
            if ($item->categories) {
                if($item->categories->count() === 1) {
                    $leaf = $item->categories->first();
                    $ancestors = $leaf->getAncestors()->pluck('id')->toArray();
                    array_push($ancestors, $leaf->id);
                    $item->categories()->sync($ancestors);
                    $this->info($item->name);

                }

            }
        });

    }

    public function syncMeta()
    {
        Product::all()->each(function ($item) {
            $item->meta_title = $item->meta_title ? $item->meta_title : $item->name;
            $item->meta_description = $item->meta_description ? $item->meta_description : $item->name;
            $item->meta_keywords = $item->meta_keywords ? $item->meta_keywords : $item->categories->pluck('name')->join(',');
            $item->save();
            $this->info(sprintf('%s meta synced.',$item->name));
        });

    }

    public function syncProps()
    {
        Property::all()->each(function($item){
            $cat = Category::find(2)->attachProp($item);
        });
    }


    public function syncSpec() {

        $cartesianIterator = new CartesianIterator();
        $props = Property::with(['values'])->ofType('sku')->get();
        $props->each(function($prop) use($cartesianIterator) {
            $values = $prop->values->pluck('value')->toArray();
            $cartesianIterator->attachIterator(new \ArrayIterator($values), $prop->name);
        });
        // The second argument controls the key of the corresponding value in the product array.
        // $cartesianIterator->attachIterator(new \ArrayIterator(['white','black']), 'color');
        // $cartesianIterator->attachIterator(new \ArrayIterator(['3T','4T']), 'size');
        $skus = iterator_to_array($cartesianIterator);
        Product::all()->each(function ($item) use($skus){
            foreach($skus as $sku)
            {
                $item->attachSpec(['specs'=>$sku]);
            }
        });
        $this->info('Product Sku generated');
    }
}
