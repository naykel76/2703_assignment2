<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        // must be logged in to place order
        $this->middleware(['auth'])->only('store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // get cart session information
        $cart = session('cart');

        // create the order
        $order = Order::create([
            'user_id' => request('user_id'),
            'supplier_id' => request('supplier_id'),
            'is_complete' => true
        ]);

        // for each item in the cart add to order details table
        foreach ($cart as $item) {

            OrderDetail::create([
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'order_id' => $order->id // this new order
            ]);
        }

        // clear cart
        $request->session()->forget('cart');

        //     // if current order then add to order else create new order
        //     // must order from same supplier

        // redirect to order confirmation page
        return redirect('/orders/show');
    }

    /**
     * Display the order with confirmation details
     */
    public function show($id)
    {
        $data = ['title' => 'Order Confirmed'];
        return view('orders.order_confirmation')->with($data);
    }

    public function confirm()
    {
        $data = ['title' => 'Order Confirmed'];
        return view('orders.order_confirmation')->with($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


// <?php

// {
//     public function __construct()
//     {
//         // protect all routes for supplier access only execpt for productBySupplier
//         // which can be accessed by anyone
//         $this->middleware(['auth', 'auth.supplier'])->except(['productBySupplier']);
//     }

//     /**
//      * Show the form for creating a new resource.
//      * @return \Illuminate\Http\Response
//      */



//     /**
//      * Show the form for editing the specified resource.
//      * @param  Model  $myModel current object
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Order $order)
//     {

//         $data = [
//             'title' => 'Edit Order',
//             'form_type' => 'edit', // used to select from type
//             'product' => $order // pass product object
//         ];

//         return view('products.edit')->with($data);
//     }


//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \App\Order current $order model
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Order $order)
//     {
//         // **** need to sort out unique and refactor ****
//         $validatedData = $request->validate([
//             'name' => 'required|min:5|max:255',
//             'price' => 'required|numeric|min:0',
//         ]);

//         if (request()->hasFile('image')) {
//             request()->validate([
//                 'image' => 'file|image|max:3000'
//             ]);
//         };



//         // add and store the product image
//         $this->storeImage($order);

//         $order->update($validatedData);

//         return redirect('dashboard');
//     }

//     /**
//      * Remove the specified resource from storage.
//      * @param  \App\Order current $order model
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Order $order)
//     {
//         $order->delete();

//         return back();
//     }


//     /**
//      * update the product image.
//      */
//     public function storeImage($order)
//     {
//         // [take the request] request()
//         // [instance of uploaded file class] ->image
//         // [store uploaded file] ->store('directory', 'locatedIn')
//         if (request()->has('image')) {
//             // update product
//             $order->update([
//                 'image' => request()->image->store('uploads/product_images', 'public')
//             ]);
//         }
//     }

//     /**
//      * Validate form fields and return validatedData array
//      * @param  \Illuminate\Http\Request  $request
//      * @return array of validate fields
//      */
//     public function validateInputs(Request $request)
//     {
//         // https://laravel.com/docs/6.x/validation#rule-unique
//         $validatedData = $request->validate([
//             'name' => 'required|unique:products|min:5|max:255',
//             'price' => 'required|numeric|min:0',
//         ]);


//         if (request()->hasFile('image')) {
//             request()->validate([
//                 'image' => 'file|image|max:3000'
//             ]);
//         };
//         return $validatedData;
//     }


//     /**
//      * Display a list of products by supplier
//      * @param integer $id is user_id
//      */
//     public function productBySupplier($id)
//     {
//         $user = User::find($id);

//         $data = [
//             'title' => 'Dishes',
//             'products' => $user->products()->paginate(4)
//         ];

//         return view('products.product-by-supplier')->with($data);
//     }
// }
