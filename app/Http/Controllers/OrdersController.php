<?php

namespace App\Http\Controllers;

use App\Order;
use App\Supplier;
use App\Product;
use App\OrderDetail;
use Carbon\Carbon;
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

        $supplier_id = Session('supplier_id');
        // get cart session information
        $cart = session('cart');

        // create the order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'supplier_id' => $supplier_id,
            'is_complete' => true,
            'payment_id' => random_int(100, 99999999),
            'total_price' => $cart->totalPrice
        ]);

        // dd($supplier_id);
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

        // clear cart session information
        $request->session()->forget('cart');
        $request->session()->forget('supplier_id');

        $serialized_cart = serialize($cart);

        session()->flash('message', "Your order has been confirmed! Order Number $order->id");

        session()->flash('confirmedOrderDetails', $serialized_cart);

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


    public function currentSales()
    {
        // sunday to sunday??
    }

    // /**
    //  * return related orders in a date range
    //  */
    // public function ordersByDate($dateFrom, $dateTo)
    // {
    //     return $this->hasMany('App\Order')->whereBetween('date', [$dateFrom, $dateTo]);
    // }


    /**
     * return a collection of sales figures grouped by week
     * for the last 12 weeks
     */
    public function salesHistory()
    {

        $totals = [];
        $dates = [];

        $dateTo = Carbon::now();
        $dateFrom = Carbon::now()->subDays(7);

        $weekEnd = -7; // current date
        $weekStart = 7;

        for ($i = 0; $i < 12; $i++) {

            $weekEnd = $weekEnd + 7;
            $weekStart = $weekEnd - 7;

            $dateTo = Carbon::now()->subDays($weekStart);
            $dateFrom = Carbon::now()->subDays($weekEnd)->toDateString();

            $totals[] = Supplier::find(Auth::id())->first()->ordersByDate($dateFrom, $dateTo)->get()->sum('total_price');

            $dates[] = $dateFrom;
        }


        //   // **** Work out days this week ****
        //   $totalDays = 84;

        //   $sales = Order::where('created_at', '>', Carbon::now()->subDays($totalDays))
        //       ->orderBy('created_at', 'desc')
        //       ->get()
        //       ->groupBy(function ($val) {
        //           return Carbon::parse($val->created_at)->format('m-d');
        //       });


        //   dd($sales);
        //   // return collection of orderDetails from the last 12 weeks
        //   $orders = Order::all();

        //   $dates = $orders->pluck('created_at');
        //   $totals = $orders->pluck('total_price');



        $data = [
            'title' => 'Sales Statistics',
            'dates' => $dates,
            'totals' => $totals,
        ];

        return view('orders.sales-history')->with($data);
    }
}


    //   // **** Work out days this week ****
    //   $totalDays = 84;

    //   $sales = Order::where('created_at', '>', Carbon::now()->subDays($totalDays))
    //       ->orderBy('created_at', 'desc')
    //       ->get()
    //       ->groupBy(function ($val) {
    //           return Carbon::parse($val->created_at)->format('m-d');
    //       });


    //   dd($sales);
    //   // return collection of orderDetails from the last 12 weeks
    //   $orders = Order::all();

    //   $dates = $orders->pluck('created_at');
    //   $totals = $orders->pluck('total_price');

    //   $data = [
    //       'title' => 'Sales Statistics',
    //       'dates' => $dates,
    //       'totals' => $totals,
    //   ];

    //   return view('orders.sales-history')->with($data);
