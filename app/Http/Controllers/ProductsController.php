<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Supplier;
use App\Product;
use App\Rules\MustBeUniqueToSupplier;

class ProductsController extends Controller
{
    /**
     *  All routes are protected by the auth.supplier middleware in the routes file
     */

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        // Why wont this work???? Not returning correct supplier!
        // dd(Supplier::find($id)->get()->pluck('is_approved')[0]);

        $id = auth::id();
        $is_approved = Supplier::where('id', $id)->get()->pluck('is_approved')[0];
        // abort if not approved
        abort_if($is_approved == '0', 403);

        $data = [
            'title' => 'Add New Dish',
            'form_type' => 'create' // used to select from type
        ];

        return view('products.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $supplier_id = Supplier::where('user_id', Auth::id())->value('id');

        $validatedData = $this->validateInputs($request, $product);

        $validatedData['supplier_id'] = $supplier_id;

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
        $this->authorize('update', $product); // abort if not authorised

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

        $this->authorize('update', $product); // abort if not authorised

        // if this product_id = product_id then it is ok to save
        // ignore this id
        $validatedData = $this->validateInputs($request, $product);

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
        $this->authorize('update', $product); // abort if not authorised

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
    public function validateInputs(Request $request, Product $product)
    {

        // [new MustBeUniqueToSupplier($supplier_id, $productTitle)]
        $supplier_id = Supplier::where('user_id', Auth::id())->value('id');

        // if product_id then record exists
        if ($product->id == null) {
            $validatedData = $request->validate([
                'name' => [
                    'required',
                    new MustBeUniqueToSupplier($supplier_id, $request->name)
                ],
                'price' => 'required|numeric|min:0',
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => [
                    'required',
                    // new MustBeUniqueToSupplier($supplier_id, $request->name, $product->id)
                ],
                'price' => 'required|numeric|min:0',
            ]);
        }

        // if there is a file validate that it is an image type
        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:3000'
            ]);
        };

        return $validatedData;
    }

    /**
     * return collection of the 5 most popular products sold in the
     * last 30 days
     */
    public function mostPopular()
    {

        // return collection of orderDetails from the last 30 days
        $recentSales = OrderDetail::where('created_at', '>', Carbon::now()->subDays(30))->get();

        $products = DB::table('order_details')
            ->groupBy('product_id')
            ->select('product_id', DB::raw('sum(qty) as qty'))
            ->where('created_at', '>', Carbon::now()->subDays(30))
            ->orderBy('qty', 'desc')
            ->take(5)
            ->get();

        $data = [
            'title' => 'Most Popular Items',
            'products' => $products
        ];

        // dd($products);
        return view('products.most-popular')->with($data);
    }
}
