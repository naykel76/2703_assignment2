<?php

namespace App;

class Cart
{

    public $items = null; // holds the individual cart items
    public $totalQty = 0;
    public $totalPrice = 0;

    /**
     * The cart will be recreated each time it is accessed. The Constructor
     * passed the old cart to the new cart so no information is lost
     */
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Add new item to cart
     * @param Object $item (Product)
     * @param string $id, item array index
     */
    public function add($item, $id)
    {
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

    /**
     * Reduce cart item quantity by 1
     * @param integer $id of item in items array
     */
    public function reduceByOne($id)
    {
        // [$this] the item from the item array selected by id
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        // if the item is zero then remove it form cart
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    /**
     * Reduce cart item quantity by 1
     * @param integer $id of item in items array
     */
    public function increaseByOne($id)
    {
        // [$this] the item from the item array selected by id
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }

    /**
     * Remove cart item
     * @param integer $id of item in items array
     */
    public function removeItem($id)
    {
        // [$this] the item from the item array selected by id
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];

        unset($this->items[$id]);
    }
}
