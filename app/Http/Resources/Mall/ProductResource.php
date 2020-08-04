<?php

namespace App\Http\Resources\Mall;

use Illuminate\Http\Resources\Json\JsonResource;
use Nexmo\Call\Collection;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        return $array;
    }



    public  function buildCategories($key = 'id')
    {
        # code...


    }

}
