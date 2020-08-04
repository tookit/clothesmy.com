<?php

namespace App\Models\Taggable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as DbCollection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use App\Models\Mall\Product;
use App\Models\CMS\Post;
class Tag extends Model implements Sortable
{
    use SortableTrait, HasSlug;

    protected $table = 'tags';

    protected $fillable = [

        'name','slug','description'
    ];

    public $guarded = [];

    public static  $allowedFilters = ['name','description'];
    public static  $allowedSorts = [];



    public $appends = [

        'href'

    ];


    public function getHrefAttribute()
    {
        return url("/tag/{$this->slug}");
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



    public function scopeWithType(Builder $query, string $type = null): Builder
    {
        if (is_null($type)) {
            return $query;
        }

        return $query->where('type', $type)->ordered();
    }

    public function scopeContaining(Builder $query, string $name, $locale = null): Builder
    {
        $locale = $locale ?? app()->getLocale();

        return $query->whereRaw('lower('.$this->getQuery()->getGrammar()->wrap('name->'.$locale).') like ?', ['%'.mb_strtolower($name).'%']);
    }

    /**
     * @param string|array|\ArrayAccess $values
     * @param string|null $type
     * @param string|null $locale
     *
     * @return \Spatie\Tags\Tag|static
     */
    public static function findOrCreate($values, string $type = null, string $locale = null)
    {
        $tags = collect($values)->map(function ($value) use ($type, $locale) {
            if ($value instanceof self) {
                return $value;
            }

            return static::findOrCreateFromString($value, $type, $locale);
        });

        return is_string($values) ? $tags->first() : $tags;
    }

    public static function getWithType(string $type): DbCollection
    {
        return static::withType($type)->ordered()->get();
    }

    public static function findFromString(string $name, string $type = null, string $locale = null)
    {

        return static::query()
            ->where("name", $name)
            ->where('type', $type)
            ->first();
    }

    public static function findFromStringOfAnyType(string $name, string $locale = null)
    {

        return static::query()
            ->where("name", $name)
            ->first();
    }

    protected static function findOrCreateFromString(string $name, string $type = null, string $locale = null)
    {

        $tag = static::findFromString($name, $type, $locale);

        if (! $tag) {
            $tag = static::create([
                'name' => $name,
                'type' => $type,
            ]);
        }

        return $tag;
    }

    public function setAttribute($key, $value)
    {

        return parent::setAttribute($key, $value);
    }

    public function products()
    {
        return $this
            ->morphedByMany(Product::class, 'taggable');
    }


    public function posts()
    {
        return $this
            ->morphedByMany(Post::class, 'taggable');
    }


}
