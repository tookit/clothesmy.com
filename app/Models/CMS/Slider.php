<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Michaelwang\Mediable\Mediable;

class Slider extends Model
{

    use Mediable,
        AuditableTrait;


    protected $table = 'slider';


    protected $fillable = [

        'name','description', 'is_active', 'img'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'is_active'=> 'boolean'
    ];

    public static  $allowedFilters = [];
    public static  $allowedSorts = [];


    public $translatable = [

        'name',
        'description'

    ];

    public function scopeVisible(Builder $query)
    {
        return $query->where('is_active','=', 1)->get();
    }


}
