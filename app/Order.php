<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        // this order belongs to a user
        // this may get confusing because of suppliers and consumers being users??
        return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
        // this order has many orderDetails (line items)
        return $this->hasMany('App\OrderDetail');
    }
}
