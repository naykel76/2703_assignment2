<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable = ['user_id', 'is_approved'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }


    /**
     * check to see if supplier is approved
     * @return boolean
     */
    public function getIsApproved($supplier_id)
    {
        $approved = Supplier::where('is_approved', true)->get();
        dd($approved);
    }

    /**
     * @return collection of suppliers NOT approved
     */
    public static function getNotApproved()
    {
        return Supplier::where('is_approved', false)->get();
    }


    /**
     * get the supplier id of the authorised supplier
     * pass in the user id and return the supplier id
     * @param integer user_id as $id
     */
    public static function getSupplierId($id)
    {
        $supplier_id = Supplier::where('user_id', $id)->value('id');
        return $supplier_id;
    }
}
