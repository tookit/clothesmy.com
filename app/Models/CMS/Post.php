<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Michaelwang\Mediable\Mediable;
class Post extends Model
{
    use
        SoftDeletes,
        HasSlug,
        Mediable,
        // HasMediaTrait,
        AuditableTrait;


    protected $table = 'posts';

    protected $fillable = [

        'name','description', 'content', 'category_id','meta_title', 'meta_keyword','meta_description','img'
    ];


    protected $guarded = [

    ];

    static $allowedFilters = [];

    static $allowedSorts = [];

    public $appends = [

        'href',

    ];

    public function getHrefAttribute()
    {
        return url("/news/item/{$this->slug}");
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }



}
