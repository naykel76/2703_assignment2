<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * must be authorised to access all methods in this class
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard with products (if supplier).
     * @param collection of product
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Product $product)
    {
        $user = Auth::user(); // current user

        $data = [
            'user' => Auth::user()
        ];

        // add the appropiate data to dashboard based on user role
        if ($user->hasRole('admin')) {
            // if the users is admin redirect to the admin dashboard
            return redirect('admin/dashboard');
        } else if ($user->hasRole('user')) {
            $data['title'] = 'User Dashboard';
        } else if ($user->hasRole('supplier')) {
            // current supplier object
            $supplier = Supplier::where('user_id', $user->id)->first();
            // products collection
            $data['products'] = $product->productsBySupplier($supplier->id);
            $data['title'] = 'Supplier Dashboard';
            $data['supplier'] = $supplier;
        }

        return view('pages.dashboard')->with($data);
    }
}
