<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    // add order item to cart session data
    public function addToCart(Request $request, Product $product)
    {

        $supplier_id = $request->supplier_id;

        // if an supplier exists an order exists
        if (Session::has('supplier_id')) {

            $id = Session('supplier_id'); // supplier in session
            // if the supplier_id is not the same at the product being added reject with message
            if ($supplier_id != $id) {
                return redirect("/restaurants/$id/products")->with('message', 'You can not order from different restaurants. Clear the cart then try again.');
                dd('sdfsdf');
            }
        } else {
            Session(['supplier_id' => $supplier_id]);
        }

        $oldCart = session()->has('cart') ? session('cart') : null;

        // create new instance of cart and pass in the old cart
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return back();
    }

    public function clearCart()
    {

        Session()->forget('cart');

        return back();
    }
    /**
     * reduce item cart qty by one
     */
    public function reduceByOne($id)
    {
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session()->put('cart', $cart);

        return back();
    }

    /**
     * increase item cart qty by one
     */
    public function increaseByOne($id)
    {
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        Session()->put('cart', $cart);

        return back();
    }

    /**
     *  remove item from cart
     */
    public function removeItem($id)
    {
        $oldCart = session()->has('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session()->put('cart', $cart);

        return back();
    }
}
