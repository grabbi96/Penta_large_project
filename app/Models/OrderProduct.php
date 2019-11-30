<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //

    protected $guarded =  [];
    public $timestamps = false;
    public function  order(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->belongsTo(Order::class);
    }

    public function  product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
