<?php

namespace App\Console\Commands;

use App\Models\Mall\Product;
use App\Models\Mall\Category;
use App\Models\CMS\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
class SyncSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate site map';

    protected $baseUrl = 'https://www.theopticalfiber.com';


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

        $sitemap = Sitemap::create()
            ->add(Url::create($this->baseUrl.'/'))
            ->add(Url::create($this->baseUrl.'/product'));
        $this->generateProduct($sitemap);
        $this->generateNews($sitemap);
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    public function generateProduct(Sitemap $sitemap){
        Product::all()->each(function ($item) use ($sitemap) {
            $sitemap->add(Url::create($this->baseUrl."/product/item/{$item->slug}"));
        });
    }

    public function generateCategory(Sitemap $sitemap){
        Category::all()->each(function ($item) use ($sitemap) {
            $sitemap->add(Url::create($this->baseUrl."/product/category/{$item->slug}"));
        });
    }

    public function generateNews(Sitemap $sitemap){
        Post::all()->each(function ($item) use ($sitemap) {
            $sitemap->add(Url::create($this->baseUrl."/news/item/{$item->slug}"));
        });
    }





}
