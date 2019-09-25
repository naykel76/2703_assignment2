<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);

        // create users with 'user' role
        // factory(App\User::class, 30)->create();


        // create user as 'supplier' then add related record to the suppliers table
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     // model->hasManyMenthodFromRelatedModel
        //     $user->supplier()->save(factory(App\Supplier::class)->make());
        // });


        // // run the model factory and create (attach) orderDetails
        // factory(Order::class, 10)->create()->each(function ($order) {
        //     // model->hasManyMenthodFromRelatedModel
        //     $order->orderdetails()->saveMany(factory(OrderDetail::class, rand(1, 5))->make());
        // });

        // this may list consumers in the supplier list but it is only to demonstrate is_approved
        // factory(App\Supplier::class, 20)->create();
    }
}
