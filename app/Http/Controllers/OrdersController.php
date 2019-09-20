<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
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
     * add the order and order_details to the database and
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

        // session()->flash('status', 'Task was successful!');
        // $request->session()->reflash();

        // $user = User::find('5');
        // session()->flash('itemsOrdered', $cart);

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

        // dd(session('cart'));

        // session()->flash('cartOld', session('cart'));

        // dd(session()->all());


        return view('orders.order_confirmed')->with($data);
    }
}
