<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $fillable = ['user_id', 'street_num', 'street', 'suburb', 'state', 'postcode'];

    /**
     * Get the owner of this address
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
