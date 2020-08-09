<?php

namespace App\Models\Mall;

use App\Traits\HasSku;
use Illuminate\Database\Eloquent\Model;
class Spec extends Model
{

    use HasSku;

    protected $table = 'product_specs';

    protected $fillable = [

        'specs','price','stock'
    ];


    protected $guarded = [

    ];

    protected $casts = [
        'specs' => 'array'
    ];




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->BelongsTo(Product::class);
    }
}
