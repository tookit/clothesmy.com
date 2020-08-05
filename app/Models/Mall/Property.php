<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{


    protected $table = 'properties';


    protected $fillable = [

        'name','type','slug'
    ];


    protected $guarded = [

    ];


    protected $casts = [

    ];

    public static  $allowedFilters = ['name'];
    public static  $allowedSorts = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(PropertyValue::class);
    }
}
