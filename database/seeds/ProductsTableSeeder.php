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
            'name' => 'The Big Philly Cheese Steak',
            'price' => '24.99',
            'image' => 'pizza1.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Garlic Chicken Bacon Ranch',
            'price' => '62.00',
            'image' => 'pizza2.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Cheesy Garlic with Crème Fraiche',
            'price' => '17.00',
            'image' => 'pizza5.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'The Big Pepperoni, Sausage Mushroom',
            'price' => '20.45',
            'image' => 'pizza4.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Chicken, Bacon Avocado',
            'price' => '16.00',
            'image' => 'pizza5.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Tropical Chicken',
            'price' => '6.50',
            'image' => 'pizza6.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Vegetarian Plant-Based Loaded Burger',
            'price' => '25.99',
            'image' => 'pizza7.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Reef, Steak Bacon',
            'price' => '9.75',
            'image' => 'pizza8.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'New Yorker half n\' half',
            'price' => '16.00',
            'image' => 'pizza9.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Loaded Chicken Supreme',
            'price' => '32.50',
            'image' => 'pizza9.jpg',
            'user_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 1',
            'price' => '4.99',
            'image' => 'item_01.jpg',
            'user_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 2',
            'price' => '6.00',
            'image' => 'item_02.jpg',
            'user_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 3',
            'price' => '16.00',
            'image' => 'item_03.jpg',
            'user_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 4',
            'price' => '0.45',
            'image' => 'item_04.jpg',
            'user_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 5',
            'price' => '6.00',
            'image' => 'item_05.jpg',
            'user_id' => 5
        ]);

        factory(Product::class, 1)->create();
    }
}
