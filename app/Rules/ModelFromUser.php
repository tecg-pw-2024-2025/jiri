<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ModelFromUser implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user_relationships = [
            'contacts' => 'contacts',
            'projects' => 'projects',
            'jiris' => 'jiris',
            'students' => 'contacts',
            'evaluators' => 'contacts',
        ];

        if (! array_key_exists($attribute, $user_relationships)) {
            $fail('You don\'t own '.$attribute.'.');
        }

        $relationship = $user_relationships[$attribute];

        $models = auth()->user()->$relationship()
            ->whereIn('id', $value)
            ->pluck('id')
            ->toArray();

        if (count(array_diff($value, $models)) !== 0) {
            $message = 'You have selected '.$attribute.' from another user.';
            $fail($message);
        }
    }
}
