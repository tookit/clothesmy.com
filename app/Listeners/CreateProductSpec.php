<?php

namespace App\Listeners;

use App\Events\PropertyValueAttached;
use App\Models\Mall\Property;

class CreateProductSpec
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PropertyValueAttached  $event
     * @return void
     */
    public function handle(PropertyValueAttached $event)
    {
        $product = $event->product;
        $propertyValue = $event->propertyValue;
        if($propertyValue->property_type === 'sku') {
            $props = Property::ofType('sku')->where('id','!=',$propertyValue->property_id)->get();
            $props->each(function($prop) use($product){
                $propertyName = $prop->name;
                $prop->values->each(function($value) use($propertyName,$product){
                    // attach sku to proudct
                    $spec = [
                        $propertyName=>$value
                    ];
                });
            });
        }
    }
}
