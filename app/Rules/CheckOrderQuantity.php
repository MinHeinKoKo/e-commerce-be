<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckOrderQuantity implements ValidationRule
{
    protected $productId;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Product::find($this->productId);

        if($product->quantity < $value){
            $fail("The :attribute you want is doesn't have in our e-commerce.");
        }
    }
}
