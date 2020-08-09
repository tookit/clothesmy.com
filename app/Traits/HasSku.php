<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSku
{
    public static function bootHasSku()
    {
        static::creating(function (Model $model) {
            if (empty($model->sku)) {
                $specs = $model->specs;
                $sku = is_array($specs) ? json_encode($specs) : $specs;
                $model->sku = (string) md5($sku);
            }
        });
    }

    public static function findBySku(string $sku): ?Model
    {
        return static::where('sku', $sku)->first();
    }
}
