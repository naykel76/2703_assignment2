<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Product;

class ProductsController extends Controller
{
    /**
     *  protect all routes for supplier access only execpt for [routes]
     *  which can be accessed by anyone
     */
    public function __construct()
    {
        $this->middleware(['auth', 'auth.supplier'])->except(['addToCart', 'productBySupplier']);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $data = [
            'title' => 'Add New Dish',
            'form_type' => 'create' // used to select from type
        ];

        return view('products.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateInputs($request);
        $validatedData['user_id'] = $request->user_id;

        // create the product
        $product = Product::create($validatedData);

        // add and store the product image
        $this->storeImage($product);

        return redirect('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Product  current $product object
     */
    public function edit(Product $product)
    {
        $data = [
            'title' => 'Edit Product',
            'form_type' => 'edit', // used to select from type
            'product' => $product // pass product object
        ];

        return view('products.edit')->with($data);
    }


    /**
     * Update the specified resource in storage.
     * @param  Product  current $product object
     */
    public function update(Request $request, Product $product)
    {
        // **** need to sort out unique and refactor ****
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:3000'
            ]);
        };



        // add and store the product image
        $this->storeImage($product);

        $product->update($validatedData);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Product current $product model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }


    /**
     * update the product image.
     */
    public function storeImage($product)
    {
        // [take the request] request()
        // [instance of uploaded file class] ->image
        // [store uploaded file] ->store('directory', 'locatedIn')
        if (request()->has('image')) {
            // update product
            $product->update([
                'image' => request()->image->store('uploads/product_images', 'public')
            ]);
        }
    }

    /**
     * Validate form fields and return validatedData array
     * @param  \Illuminate\Http\Request  $request
     * @return array of validate fields
     */
    public function validateInputs(Request $request)
    {
        // https://laravel.com/docs/6.x/validation#rule-unique
        $validatedData = $request->validate([
            'name' => 'required|unique:products|min:5|max:255',
            'price' => 'required|numeric|min:0',
        ]);


        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:3000'
            ]);
        };
        return $validatedData;
    }


    /**
     * Display a list of products by supplier
     * @param integer $id is user_id
     */
    public function productBySupplier($id)
    {

        $user = User::find($id);

        $data = [
            'title' => 'Menu',
            'products' => $user->products()->paginate(4),
            'supplier' => $user
        ];

        return view('products.product-by-supplier')->with($data);
    }
}
