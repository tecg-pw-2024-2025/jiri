<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ModelFromUser implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user_relationships = [
            'contacts' => 'id',
            'projects' => 'id',
            'jiris' => 'id',
            'students' => 'contact_id',
            'evaluators' => 'contact_id',
        ];

        if (!array_key_exists($attribute, $user_relationships)) {
            $fail('You don\'t own '.$attribute.'.');
        }

        $relationship = $attribute === 'students' || $attribute === 'evaluators' ? 'attendances' : $attribute;

        $key_name = $user_relationships[$attribute];

        $models = auth()->user()->$relationship()
            ->whereIn($key_name, $value)
            ->pluck($key_name)
            ->toArray();

        if (count(array_diff($value, $models)) !== 0) {
            $message = 'You have selected '.$attribute.' from another user.';
            $fail($message);
        }
    }
}
