<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Quote extends Model
{
    use SoftDeletes;

    public static  $allowedFilters = [];
    public static  $allowedSorts = [];

    protected $table = 'mall_quotes';

    protected $fillable = [

        'customer_id','ip','username','mobile','email','remark','flag'
    ];


    protected $guarded = [

    ];




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
