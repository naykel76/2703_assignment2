<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    // a product belongs to one supplier (restuaraunt)
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    /**
     * Return collection of products by supplier
     * @param integer $id is supplier_id
     */
    public function productsBySupplier($id)
    {
        $supplier = Supplier::find($id);
        $products = $supplier->products()->get();
        return $products;
    }
}
