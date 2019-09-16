<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Role;
use App\User;

class PagesController extends Controller
{

    /**
     * displays the home page with products
     */
    public function index()
    {
        $data = [
            'title' => 'Home Page',
            'products' => Product::paginate(5)
        ];

        return view('pages.index')->with($data);
    }

    /**
     * Display list of restaurants
     */
    public function suppliers()
    {
        // returns collection of all users where role.name = 'supplier'
        $role = Role::where('name', 'supplier')->first(); // get the role object

        $data = [
            'title' => 'Resturant List',
            'users' => $role->users // get the users (restaurants) collection
        ];

        return view('pages.suppliers')->with($data);
    }
}
