<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Michaelwang\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait,
        HasSlug,
        // HasMediaTrait,
        AuditableTrait;
    protected $table = 'categories';

    const PROMOTE = ['male','female','other'];

    protected $fillable = [

        'name','slug', 'description', 'parent_id','meta_title','flag'
    ];

    protected $hidden = ['pivot'];

    protected $guarded = [

    ];

    protected $casts = [
        'is_active'=>'boolean'
    ];

    public $translatable = [
        'name',
        'description'

    ];

    static $allowedFilters = [];

    static $allowedSorts = [];

    public $appends = [

        'href',

    ];

    public function getHrefAttribute()
    {
        return url("/news/category/{$this->slug}");
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
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('flag', $type);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function ancestorsAndSelf() {
        return $this->newScopedQuery()
            ->where($this->getLftName(), '<=', $this->getLft())
            ->where($this->getRgtName(), '>=', $this->getRgt());
    }
}
