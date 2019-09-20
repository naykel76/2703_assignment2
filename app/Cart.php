<?php

namespace App;

class Cart
{

    public $items = null; // holds the individual cart items
    public $totalQty = 0;
    public $totalPrice = 0;


    /**
     * the cart is recreated each time it is accessed
     * pass the old cart to the new cart so no information
     * is lost
     */
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        // session()->flush();
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}
