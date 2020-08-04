<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{

    use SoftDeletes;

    protected $table = 'menus';

    public  static $allowedFilters = ['name'];
    public  static $allowedSorts = ['name'];

    protected $fillable = [

        'name', 'sort_number', 'uri', 'icon', 'is_active',
    ];


    protected $guarded = [];


    protected $casts = [

        'is_active' => 'boolean'
    ];
}
