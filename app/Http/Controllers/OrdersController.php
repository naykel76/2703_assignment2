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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


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

    /**
     * @return double $total_sales for the authorised supplier
     */
    public function totalSales()
    {
        return Supplier::find(Auth::id())->orders->sum('total_price');
    }

    /**
     * Return sales figures for the last 12 weeks
     * This is not the most elegant function but it works. Dates Suck!
     */
    public function salesHistory()
    {

        $totals = [];
        $dates = [];

        $weekEnding = Carbon::now();
        $weekStart = Carbon::now()->subDays(7);

        for ($i = 0; $i < 12; $i++) {

            $figure = Supplier::find(Auth::id())->first()->ordersByDate($weekStart, $weekEnding)->get()->sum('total_price');

            $totals[] = number_format($figure, 2, '.', '');

            $dates[] = $weekEnding->toDateString();

            $weekEnding = $weekEnding->subDays(7);
            $weekStart = $weekStart->subDays(7);
        }

        // $mapped = array_combine($dates, $totals);

        // foreach ($mapped as $key => $value) {
        //     print_r($value);
        // }
        // // $mapped[$special_id] = $names[$special_name];
        // dd($mapped);


        $data = [
            'title' => 'Sales Statistics',
            'dates' => $dates,
            'totals' => $totals,
            'totalSales' => number_format($this->totalSales(), 2, '.', ''),
            'salesArray' => array_combine($dates, $totals)
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
