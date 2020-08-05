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


    protected $casts = [
    ];


    public $translatable = [

    ];

    public static  $allowedFilters = ['value'];
    public static  $allowedSorts = [];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
