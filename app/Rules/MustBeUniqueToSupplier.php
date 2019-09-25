<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Product;

class MustBeUniqueToSupplier implements Rule
{

    public $supplier_id;
    public $product;

    /**
     * Create a new rule instance - check if product name is unique to supplier
     * @param object $supplier current logged in supplier
     * @param string $productTitle
     * @param  integer $product_id (optional)
     */
    public function __construct($supplier_id, $productTitle, $product_id = 0)
    {
        $this->supplier_id = $supplier_id;
        $this->productTitle = $productTitle;
        $this->product_id = $product_id;
    }

    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute input name
     * @param  mixed  $value input value
     * @return bool
     * call with new MustBeUniqueToSupplier($supplier_id, $productTitle)
     */
    public function passes($attribute, $value)
    {
        // get collection of supplier products
        $products = Product::where('supplier_id', $this->supplier_id)->get();

        // if the product already exists and is the current product the all is well

        // dd($this->product_id == $id);


        // if the products collection contains the value (product name)
        if ($products->contains('name', $value)) {
            return false; // is unique
        } else {
            return true;
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
