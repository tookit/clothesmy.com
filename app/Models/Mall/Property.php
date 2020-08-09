<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{

    use HasSlug;

    protected $table = 'properties';


    protected $fillable = [

        'name','type','slug'
    ];


    protected $guarded = [

    ];

    protected $hidden = ['pivot'];

    protected $casts = [

    ];

    public static  $allowedFilters = ['name'];
    public static  $allowedSorts = [];

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
     * Scope a query to only include props of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(PropertyValue::class);
    }


    /**
     * @param array|\ArrayAccess|\App\Models\Mall\PropertyValue $values
     *
     * @return $this
     */
    public function attachValues($values)
    {
        $value = (PropertyValue::updateOrCreate($values));
        $this->values()->save($value);
        return $this;
    }

    /**
     * @param string|\App\Models\Mall\PropertyValue $value
     *
     * @return $this
     */
    public function attachValue($value)
    {
        return $this->attachValues(['value' =>$value]);
    }
}
