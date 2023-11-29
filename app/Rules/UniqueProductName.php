<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Product;
class UniqueProductName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
          if(Product::where('user_id', $attribute)
            ->where('name', $value)
            ->exists()){
                $fail('Product has already been added');
            };
    }

    public function message()
    {
        return 'Product has already been added';
    }
}
