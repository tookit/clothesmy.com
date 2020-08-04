<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Michaelwang\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Michaelwang\Mediable\Mediable;


class Category extends Model
{

    use NodeTrait,
        Mediable,
        HasSlug;


    protected $table = 'mall_categories';



    protected $fillable = [

        'name','description','is_active', 'is_home', 'meta_title', 'meta_keywords', 'meta_description','parent_id','featured_img'
    ];


    protected $guarded = [

    ];

    protected $hidden = ['pivot'];
    protected $casts = [

        'is_active'=>'boolean',
        'is_home'=>'boolean'
    ];

    public static  $allowedFilters = [
        'name'
    ];
    public static  $allowedSorts = [];


    public $appends = [

        'href',

    ];

    public function getHrefAttribute()
    {
        return url("/product/category/{$this->slug}");
    }


    public function getProcessImage($width = 'w_200', $height = 'h_200'): string
    {
        //?x-oss-process=image/auto-orient,1/resize,m_fixed,w_200,h_200/quality,q_90/watermark,text_S2FtZSBUZWNobm9sb2d5,color_a6a0a0,size_22,g_center,t_42,x_10,y_10
        $width = $width ?? 'w_200';
        $height = $height ?? 'h_200';
        $query =
            '?x-oss-process='.sprintf('image/auto-orient,1/resize,m_fixed,%s,%s/quality,q_90/watermark,text_S2FtZSBUZWNobm9sb2d5,color_a6a0a0,size_22,g_center,t_42,x_10,y_10', $width, $height);
        return $this->featured_img.$query;
    }


    public function getNameAttribute($val) {
        return htmlspecialchars_decode($val);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage(app()->getLocale())
            ->saveSlugsTo('slug');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_has_categories');
    }

    /**
     * Return an array of all child category ids.
     *
     * @return array
     */
    public function getChildrenIds()
    {
        return $this->scopeAllChildren(self::newQuery(), true)
            ->get(['id'])
            ->pluck('id')
            ->toArray();
    }


    public function scopeAllChildren($query, $includeSelf = false)
    {
        $query
            ->where($this->getLftName(), '>=', $this->getLft())
            ->where($this->getRgtName(), '<', $this->getRgt())
        ;

        return $includeSelf ? $query : $query->withoutSelf();
    }

    public function getAllChildrenAndSelf()
    {
        return $this->newQuery()->allChildren(true)->get();
    }

    public function getAllProducts() {
        return Product::inCategories($this->getAllChildrenAndSelf()->pluck('id')->toArray())->paginate();
    }

}
