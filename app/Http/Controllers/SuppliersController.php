<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    /**
     * Display list of all approved restaurants
     */
    public function suppliers()
    {
        $data = [
            'title' => 'Resturant List',
            'suppliers' =>  Supplier::where('is_approved', true)->get()
        ];

        return view('pages.suppliers')->with($data);
    }

    /**
     * Display a list of products by supplier
     * @param integer $id is user_id
     */
    public function productBySupplier($supplier_id)
    {

        $supplier = Supplier::findOrFail($supplier_id);

        $data = [
            'title' => 'Menu',
            'products' => $supplier->products()->paginate(4),
            'supplier' => $supplier,
            'supplierName' => $supplier->user->name
        ];

        return view('products.product-by-supplier')->with($data);
    }

    /**
     * Supplier order history
     * protected route (auth.supplier)
     * @return $orders
     */
    public function ordersBySupplier()
    {

        // get the supplier object
        $supplier = Supplier::find(Auth::id());

        // return collection of orders using eloquent relationship
        $orders = $supplier->orders()->paginate(100);

        $data = [
            'title' => 'Orders History',
            'orders' => $orders
        ];

        return view('orders.orders-by-supplier')->with($data);
    }
}
