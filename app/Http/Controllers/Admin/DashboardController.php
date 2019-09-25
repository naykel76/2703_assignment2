<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Supplier;

class DashboardController extends Controller
{
    public function index()
    {

        // dd(Supplier::getNotApproved());

        $data = [
            'title' => 'Admin Dashboard',
            'user' => Auth::user(), // current admin user

            'suppliers' => Supplier::getNotApproved()
        ];

        return view('admin.dashboard')->with($data);
    }


    /**
     * @param $id supplier_id
     */
    public function approveSupplier(Request $request)
    {

        $supplier = Supplier::find($request->supplier_id);

        $supplier->is_approved = 1;
        // $supplier['is_approved'] = 1;

        $supplier->save();

        return back();
    }


    // $data['products'] = $product->productsBySupplier($supplier_id);


}
