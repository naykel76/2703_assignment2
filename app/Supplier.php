<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable = ['id', 'image', 'user_id', 'is_approved'];

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
     * return related orders in a date range
     */
    public function ordersByDate($dateFrom, $dateTo)
    {
        return $this->hasMany('App\Order')
            ->where('created_at', '>', $dateFrom)
            ->where('created_at', '<', $dateTo);
    }
}
