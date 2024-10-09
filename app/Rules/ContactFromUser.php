<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContactFromUser implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $contacts = auth()->user()->contacts()
            ->whereIn('id', $value)
            ->pluck('id')
            ->toArray();

        if (count(array_diff($value, $contacts)) !== 0) {
            $fail('The selected contacts are invalid.');
        }
    }
}
