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
            'image' => 'uploads/product_images/pizza1.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Garlic Chicken Bacon Ranch',
            'price' => '62.00',
            'image' => 'uploads/product_images/pizza2.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Cheesy Garlic with Crème Fraiche',
            'price' => '17.00',
            'image' => 'uploads/product_images/pizza5.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'The Big Pepperoni, Sausage Mushroom',
            'price' => '20.45',
            'image' => 'uploads/product_images/pizza4.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Chicken, Bacon Avocado',
            'price' => '16.00',
            'image' => 'uploads/product_images/pizza5.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Tropical Chicken',
            'price' => '6.50',
            'image' => 'uploads/product_images/pizza6.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Vegetarian Plant-Based Loaded Burger',
            'price' => '25.99',
            'image' => 'uploads/product_images/pizza7.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Reef, Steak Bacon',
            'price' => '9.75',
            'image' => 'uploads/product_images/pizza8.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'New Yorker half n\' half',
            'price' => '16.00',
            'image' => 'uploads/product_images/pizza9.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Loaded Chicken Supreme',
            'price' => '32.50',
            'image' => 'uploads/product_images/pizza9.jpg',
            'supplier_id' => 4
        ]);

        Product::create([
            'name' => 'Menu Item 1',
            'price' => '4.99',
            'image' => 'uploads/product_images/item_01.jpg',
            'supplier_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 2',
            'price' => '6.00',
            'image' => 'uploads/product_images/item_02.jpg',
            'supplier_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 3',
            'price' => '16.00',
            'image' => 'uploads/product_images/item_03.jpg',
            'supplier_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 4',
            'price' => '0.45',
            'image' => 'uploads/product_images/item_04.jpg',
            'supplier_id' => 5
        ]);

        Product::create([
            'name' => 'Menu Item 5',
            'price' => '6.00',
            'image' => 'uploads/product_images/item_05.jpg',
            'supplier_id' => 5
        ]);

        // factory(Product::class, 1)->create();
    }
}



// Product::create([
//     'name' => 'Meatball Melt Subway Six Inch®',
//     'price' => 7.85,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/c3498c8e-58b6-4630-8f45-4f7e8a9c8b89',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Carved Turkey Subway Six Inch®',
//     'price' => 8.40,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/32dad422-72e2-48e6-bbf5-3cc592195222',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Leg Ham Subway Six Inch®',
//     'price' => 7.25,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/fd0af5c9-acaf-4b86-aadf-82e64a95f8a4',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Veggie Delite® with Avo Subway Six Inch®',
//     'price' => 5.80,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/a5f660d0-2dc9-4ad4-b47b-e45e4ad5f9be',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Pizza Melt Subway Six Inch®',
//     'price' => 5.80,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/d9e98726-8039-4fb1-8e7c-f5da9b1ff21e',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Italian B.M.T.® Subway Six Inch®',
//     'price' => 8.40,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/71084f92-5de7-41c7-925e-21a1169ad196',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Roast Beef Subway Six Inch®',
//     'price' => 5.80,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/0451417a-dc79-40ff-b5c4-c034ae112c10',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Tuna & Mayo Subway Six Inch®',
//     'price' => 5.80,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/debae01e-51d6-490a-813e-784d813c42d8',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chicken Teriyaki Subway Six Inch®',
//     'price' => 9.20,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/c7fddb98-f2c7-43ef-8a59-97c4a3f86060',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chipotle Steak Melt Subway Six Inch®',
//     'price' => 9.55,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/89050875-cc11-4172-818e-59680e120f13',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chicken Classic Subway Six Inch®',
//     'price' => 9.20,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/5cae455e-30d5-4e56-8e25-2bdca065b00b',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chicken & Bacon Ranch Melt Subway Six Inch®',
//     'price' => 9.55,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/72e0915b-5188-4eb4-88e6-0756d42a9f0f',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chicken Schnitzel Subway Six Inch®',
//     'price' => 9.55,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/8f214e20-8891-4520-a145-7b469344d8ef',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Veggie Patty Subway Six Inch®',
//     'price' => 8.05,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/845af2d8-5b91-4860-812e-4cfcfc920093',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Chicken Strips Subway Six Inch®',
//     'price' => 9.20,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/cba82eff-f306-46c5-96b4-cdeef5072da8',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Smashed Falafel Subway Six Inch®',
//     'price' => 8.40,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/bf11b64a-fd01-406b-9b99-8f46d3a67fa8',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Buffalo Chicken Subway Six Inch®',
//     'price' => 9.55,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/af7a5aff-c5c2-4660-a6a6-e1246c85f7f2',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Mediterranean Chicken Subway Six Inch®',
//     'price' => 9.20,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/9aa82475-43d8-4c9b-b921-d707546663c9',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Meatball Melt Subway Footlong®',
//     'price' => 11.30,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/4248b367-0bd9-439c-8a99-7379087ab806.jpeg',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Carved Turkey Subway Footlong®',
//     'price' => 11.90,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/8f4f2a32-c66e-4f5d-8508-3d2f0dabe723.jpeg',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Leg Ham Subway Footlong®',
//     'price' => 10.75,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/b33cad3b-0540-4d5d-8f8f-cb10c2b91cff.jpeg',
//     'supplier_id' => 4
// ]);
// Product::create([
//     'name' => 'Veggie Delite® with Avo Subway Footlong®',
//     'price' => 9.30,
//     'image' => 'https://d1ralsognjng37.cloudfront.net/ab6b0e77-d6ba-4372-bed8-a983538e466b.jpeg',
//     'supplier_id' => 4
// ]);
