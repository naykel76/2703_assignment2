<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
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

        return view('orders.order_confirmed')->with($data);
    }

    /**
     * protected route (auth.supplier)
     */
    public function ordersBySupplier()
    {
        // authorised supplier id
        $id = Auth::id();

        // return collection of all orders for current supplier
        $orders = Order::where('supplier_id', $id)->get();

        $data = [
            'title' => 'Orders History',
            'orders' => $orders
        ];

        return view('orders.orders-by-supplier')->with($data);
    }
}
