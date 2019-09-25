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
        // run the model factory and create (attach) address
        // factory(App\Order::class, 10)->create();

        // run the model factory and create (attach) orderDetails
        factory(Order::class, 30)->create()->each(function ($order) {
            // model->hasManyMenthodFromRelatedModel
            $order->orderdetails()->saveMany(factory(OrderDetail::class, rand(1, 5))->make());
        });
    }
}
