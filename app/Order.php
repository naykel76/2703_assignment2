<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function supplier()
    {
        // this order belongs to a supplier
        return $this->belongsTo('App\Supplier');
    }

    public function orderDetails()
    {
        // this order has many orderDetails (line items)
        return $this->hasMany('App\OrderDetail');
    }
}
