<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UrlProtocolPrefix implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/^(http:\/\/|https:\/\/)/', $value) !== 1) {
            $fail(":attribute $attribute. The :attribute must start with http:// or https://");
        }
    }
}
