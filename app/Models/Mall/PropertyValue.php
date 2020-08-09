<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class PropertyValue extends Model
{

    use HasUuid;

    protected $table = 'property_values';


    protected $fillable = [

        'value'
    ];


    protected $guarded = [

    ];

    protected $hidden = ['pivot'];
    protected $casts = [
    ];


    public $translatable = [

    ];

    public static  $allowedFilters = ['value'];
    public static  $allowedSorts = [];


    public $appends = [

        'property_name',
        'property_slug',
        'property_type'

    ];

    protected static function booted()
    {
        static::created(function ($model) {
            //
        });
    }

    public function getPropertyTypeAttribute()
    {
        return $this->property ? $this->property->type : null;
    }


    public function getPropertyNameAttribute()
    {
        return $this->property ? $this->property->name : null;
    }

    public function getPropertySlugAttribute()
    {
        return $this->property ? $this->property->slug : null;
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
