<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{



    protected $table = 'property_values';


    protected $fillable = [

        'value'
    ];


    protected $guarded = [

    ];


    protected $casts = [
        'description' => 'json',
    ];


    public $translatable = [

    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
