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
        $this->middleware(['auth'])->only('store', 'orderConfirmed');
    }

    /**
     * store (checkout)
     * add the order and order_details to the database and
     */
    public function store(Request $request)
    {
        // get cart session information
        $cart = session('cart');

        // create the order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'supplier_id' => request('supplier_id'),
            'is_complete' => true,
            'payment_id' => random_int(100, 99999999)
        ]);

        // ***NBW could refactor price in cart model to be a little more intuitive ***
        // for each item in the cart add to order details table
        foreach ($cart->items as $product) {

            OrderDetail::create([
                'product_id' => $product['item']['id'],
                'qty' => $product['qty'],
                'unit_price' => $product['price'] / $product['qty'],
                'ext_price' => $product['price'],
                'order_id' => $order->id // this new order
            ]);
        }

        // clear cart
        $request->session()->forget('cart');

        $serialized_cart = serialize($cart);

        session()->flash('message', "You order has been received! Order Number $order->id");

        session()->flash('finalOrderDetails', $serialized_cart);

        // redirect to order confirmation page
        return redirect('/order-confirmed');
    }

    /**
     * Confirm order and display order details
     */
    public function orderConfirmed()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Order Confirmed',
            'user' => $user,
            'address' => $user->address
        ];

        // if the is no cart protect route
        // if (!session()->has('cart')) {
        //     return redirect('/suppliers');
        // }
        // if (session::has('cart')) {
        //     dd('fsdf');
        // }

        // session()->flash('cartOld', session('cart'));

        // dd(session()->all());


        return view('orders.order_confirmed')->with($data);
    }
}




// @foreach (Session::get('cart')->items as $product)

//     <li>

//       <a href="{{ route('products.reduce', $product['item']['id']) }}">
//         <svg class="icon-minus">
//           <use xlink:href="/svg/icons.svg#icon-minus-circle"></use>
//         </svg>
//       </a>

//       <input type="text" value="{{$product['qty']}}" style="width: 50px;" class="txt-ctr mx" disabled>

//       <a href="{{ route('products.increase', $product['item']['id']) }}">
//         <svg class="icon-plus mr-lg">
//           <use xlink:href="/svg/icons.svg#icon-plus-circle"></use>
//         </svg>
//       </a>

//       <span class="mr">{{$product['item']['name']}}</span><span>${{number_format($product['item']['price'], 2)}} ea</span>

//       <a href="{{ route('products.remove', $product['item']['id']) }}" class="txt-red ml-lg">
//         {{-- <svg class="icon-cross txt-red ml-lg">
//         <use xlink:href="/svg/icons.svg#icon-cross-circle"></use>
//       </svg> --}}
//         Remove Item
//       </a>

//       <hr>

//       @endforeach
