<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasCloud
{
    public static function bootHasCloud()
    {
        static::created(function (Model $model) {
            if (empty($model->disk === 'oss')) {
                $model->cloud_url = $model->getUrl();
                $model->save();
            }
        });
    }

}
