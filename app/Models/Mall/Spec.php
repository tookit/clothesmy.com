<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
class Spec extends Model
{

    protected $table = 'product_specs';

    protected $fillable = [

        'specs','price','stock'
    ];


    protected $guarded = [

    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->BelongsTo(Product::class);
    }
}
