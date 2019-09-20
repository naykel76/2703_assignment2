<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    // add order item to cart session data
    public function addToCart(Request $request, Product $product)
    {

        $oldCart = session()->has('cart') ? session('cart') : null;

        // create new instance of cart and pass in the old cart
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return back();
    }

    // public function totals()
    // {
    //     $cart = session('cart');
    //     $total = 0;

    //     foreach ($cart as $index => $item) {
    //         $lineTotal = $item['price'] * $item['qty'];
    //         $total += $lineTotal;
    //     }

    //     echo 'Order Total ' . $total;
    // }
}

// // loop through all items in the cart
// foreach (session('cart') as $index => $cartItemArr) {
//     // echo $cartItemArr['product_id'] . "\n";

//     if ($cartItemArr['product_id']  == 94) {
//         $request->session()->forget("cart.$index"); // this is not the index number it is like the name??
//         // echo $index . "\n";
//     }
// }
