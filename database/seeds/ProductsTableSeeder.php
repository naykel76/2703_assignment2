<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
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
            'image' => '/images/item_01.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item2',
            'price' => '6.00',
            'image' => '/images/item_02.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item3',
            'price' => '16.00',
            'image' => '/images/item_03.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item4',
            'price' => '0.45',
            'image' => '/images/item_04.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item5',
            'price' => '6.00',
            'image' => '/images/item_05.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item6',
            'price' => '6.50',
            'image' => '/images/item_06.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item7',
            'price' => '25.99',
            'image' => '/images/item_07.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item8',
            'price' => '9.75',
            'image' => '/images/item_08.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Food Item9',
            'price' => '6.00',
            'image' => '/images/item_09.jpg',
            'user_id' => 3
        ]);

        Product::create([
            'name' => 'Menu Item 1',
            'price' => '4.99',
            'image' => '/images/item_01.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 2',
            'price' => '6.00',
            'image' => '/images/item_02.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 3',
            'price' => '16.00',
            'image' => '/images/item_03.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 4',
            'price' => '0.45',
            'image' => '/images/item_04.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 5',
            'price' => '6.00',
            'image' => '/images/item_05.jpg',
            'user_id' => 4
        ]);
    }
}
