<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded =  [];

    public function order()
    {
        // this order detail (line item) belongs to one order
        return $this->belongsTo('App\Order');
    }
}
