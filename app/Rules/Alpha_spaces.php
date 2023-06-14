<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Alpha_spaces implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //should only accept letters and space, and blank
        if (!preg_match('/^[a-zA-Z ]*$/', $value)) {
            $fail(__('validation.alpha_spaces', ['attribute' => $attribute]));
        }
    }
}
