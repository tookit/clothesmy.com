<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{


    protected $table = 'properties';


    protected $fillable = [

        'value'
    ];


    protected $guarded = [

    ];


    protected $casts = [

    ];




    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(PropertyValue::class);
    }
}
