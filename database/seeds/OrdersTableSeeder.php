<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Food Item1',
            'price' => '4.99',
            'image' => 'item_01.jpg',
            'user_id' => 3
        ]);
    }
}
