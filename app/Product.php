<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    public function user()
    {
        // a product belongs to one user (restuaraunt)
        return $this->belongsTo('App\User');
    }

    /**
     * Display a list of products by supplier
     * @param integer $id is user_id as supplier_id
     */
    public function productsBySupplier($user_id)
    {
        $user = User::find($user_id);
        $products = $user->products()->get();
        return $products;
    }
}
