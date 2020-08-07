<?php

namespace App\Models\Mall;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTags;
use Michaelwang\Mediable\Mediable;

class Product extends Model
{

    use HasSlug,
        HasTags,
        // Searchable,
        Metable,
        Mediable,
        AuditableTrait;


    const COLLECTION = 'clothes';

    public static  $allowedFilters = ['name','categories.name','description','is_active'];
    public static  $allowedSorts = [];


    protected $table = 'mall_products';

    static $flags = [

        'hot','promoted','archived'
    ];

    protected $fillable = [

        'custom_id','name','description','body', 'applications','features','specs','ordering','reference_url','ali_url','amazon_url','featured_img', 'meta_title','meta_keywords', 'meta_description'
    ];

    protected $hidden = ['pivot'];

    protected $guarded = [

    ];


    protected $casts = [
        'is_active'=>'boolean',
        'is_home'=>'boolean',
    ];


    public $appends = [

        'href'

    ];


    public function getNameAttribute($val) {
        return htmlspecialchars_decode($val);
    }

    public function getHrefAttribute()
    {
        return url("/product/item/{$this->slug}");
    }

    public function toSearchableArray()
    {
        return array_filter([$this->name, $this->description, $this->specs]);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'product';
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

    /**
     * @param array|\ArrayAccess|\App\Models\Mall\PropertyValue $prop
     *
     * @return $this
     */
    public function attachProp($prop)
    {
        $instance = (is_array($prop)) ? Property::firstOrNew($prop) : $prop;
        $this->props()->syncWithoutDetaching([$instance->id]);
        return $this;
    }



    public function includeMedia($media)
    {
        if($this->media->count() === 0){
            return false;
        }else {
            return $this->media->contains($media);
        }

    }

    public function scopeHasImage($query, $bool) {

        return $bool ?  $query->whereHas('media') : $query->whereDoesntHave('media');

    }

    public function scopeInCategories($query, $ids)
    {
        if ( ! count($ids)) {
            return $query;
        }

        return $query->whereHas('categories', function ($q) use ($ids) {
            $q->whereIn('category_id', $ids);
        });
    }

    public function getFirstImageUrl() {
        return $this->firstMedia(self::COLLECTION) ? $this->firstMedia(self::COLLECTION)->getUrl().'?x-oss-process=image/auto-orient,1/quality,q_90/watermark,text_S2FtZSBUZWNobm9sb2d5,color_a6a0a0,size_22,g_center,t_42,x_10,y_10' : '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_has_categories');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function props()
    {
        return $this->belongsToMany(PropertyValue::class,'product_has_properties');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function getCategoriesWithSelf()
    {

    }

}
