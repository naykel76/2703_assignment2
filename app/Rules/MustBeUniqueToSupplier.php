<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MustBeUniqueToSupplier implements Rule
{

    public $user;
    public $product;

    /**
     * Create a new rule instance - check if product name is unique to supplier
     * @param object $user current loged in user (supplier) instance
     * @param string $productTitle
     * @param  integer $product_id (optional)
     */
    public function __construct($user, $productTitle, $product_id = 0)
    {
        $this->user = $user;
        $this->productTitle = $productTitle;
        $this->product_id = $product_id;
    }

    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute input name
     * @param  mixed  $value input value
     * @return bool
     * name' => [new MustBeUniqueToSupplier($userObject, $productTitle)]
     */
    public function passes($attribute, $value)
    {

        // dd($this->product_id);
        // if there is an product_id then product->edit else product->new
        if ($this->product_id > 0) {
            // ignore
        }

        // if (in_array($this->productTitle, $product) && $this->product_id != $product_id)) {}


        // get supplier products User->hasMany->Products relationship
        $products = $this->user->products()->get()->toArray();

        // loop through each product
        foreach ($products as $index => $product) {
            // dd($product['id']);
            // check if $this->productTitle (new title) exists in the $products array
            // if (in_array($this->productTitle, $product) && $product['id'] != $this->product_id) {
            if (in_array($this->productTitle, $product)) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This product is already listed.';
    }
}
