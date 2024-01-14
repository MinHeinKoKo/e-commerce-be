<?php

namespace App\Rules;

use App\Models\Discount;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class ValidateCouponDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
// Retrieve existing coupons
        $existingCoupons = Discount::all();

        $startAt = Carbon::parse($value);
        $expiresAt = Carbon::parse($value);

        foreach ($existingCoupons as $existingCoupon) {
                if (
                    ($startAt >= $existingCoupon->start_at && $startAt <= $existingCoupon->expires_at) ||
                    ($expiresAt >= $existingCoupon->start_at && $expiresAt <= $existingCoupon->expires_at)
                )
            {
                $fail("The :attribute can't be overlap"); // Overlapping dates found
            }
        }
    }
}
