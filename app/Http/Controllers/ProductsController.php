<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Product;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource
     */
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Dishes',
    //     ];

    //     return view('products.list')->with($data);
    // }

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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $this->validateInputs($request);
        $validatedData['user_id'] = $request->user_id;

        Product::create($validatedData);

        return redirect('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Model  $myModel current object
     * @return \Illuminate\Http\Response
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
     *
     * @param  \App\Product current $product model
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable',
        ]);

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
     * Validate form fields and return validatedData array
     * @param  \Illuminate\Http\Request  $request
     * @return array of validate fields
     */
    public function validateInputs(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products|min:5|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable',
        ]);

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
            'title' => 'Dishes',
            'products' => $user->products()->paginate(5)
        ];

        return view('products.index')->with($data);
    }
}
