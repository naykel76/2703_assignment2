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


    // public function test(Request $request)
    // {

    //     $data = [
    //         'title' => 'Testing Page',

    //     ];

    //     // $val = $request->session()->all();

    //     $items = $request->session()->get('order.item');
    //     // $items = session('order.item');

    //     return $items;

    //     foreach ($items as $item) {
    //         echo 'sdf';
    //     }

    //     return view('test')->with($data)->with($items);
    // }
}
