<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\OrderDetail;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // run the model factory and create (attach) orderDetails
        factory(Order::class, 500)->create()->each(function ($order) {
            // add 1 - 5 line items to the order
            $order->orderdetails()->saveMany(factory(OrderDetail::class, rand(1, 5))->make());
        });
    }
}
