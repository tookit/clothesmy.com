<?php
namespace App\Observers;


use Illuminate\Database\Eloquent\Model;
use App\Models\Mall\PropertyValue;
use App\Models\Mall\Property;
use App\Models\Mall\Spec;

class PropertyValueObserver
{
    /**
     * Model's creating event hook.
     *
     * @param Model $model
     */
    public function updated(PropertyValue $model)
    {

        //  add sku
        if($model->property_type === 'sku') {
            $props = Property::ofType('sku')->where('id','!=',$model->id)->get();
            $props->each(function($prop){
                $propertyName = $prop->name;
                $prop->values->each(function($value) use($propertyName){
                    // attach sku to proudct
                });
            });
        }
    }

}
