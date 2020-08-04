<?php

namespace App\Models\Media;

use App\Models\CMS\Slider;
use App\Models\Mall\Product;
use App\Traits\HasUuid;

use Michaelwang\Mediable\Media as Base;

class Media extends Base
{

    use HasUuid;

    protected $table = 'medias';


    public static  $allowedFilters = [];
    public static  $allowedSorts = [];
    protected $fillable = [

    ];


    protected $guarded = [

    ];


    protected $casts = [
        'attached' => 'boolean'
    ];

    public $appends = [

        'url'
    ];

    public  function scopeOrder($query)
    {
        return $query->orderBy('created_at','desc');
    }

    public function getUrlAttribute(): string
    {
        return url($this->getUrl());
    }

    public function getProcessImage($width = 'w_200', $height = 'h_200'): string
    {
        $width = $width ?? 'w_200';
        $height = $height ?? 'h_200';
        $query =
            '?x-oss-process='.sprintf('image/auto-orient,1/resize,m_fixed,%s,%s/quality,q_90/watermark,text_S2FtZSBUZWNobm9sb2d5,color_a6a0a0,size_22,g_center,t_42,x_10,y_10', $width, $height);
        return url($this->getUrl()).$query;
    }

    public function product()
    {
        return $this->morphedByMany(Product::class, 'mediable');
    }

    public function slider()
    {
        return $this->morphedByMany(Slider::class, 'mediable');
    }

    public function attachProduct($product)
    {

    }
}
