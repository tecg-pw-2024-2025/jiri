<?php

namespace App\Http\Requests;

use App\Rules\ContactFromUser;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JiriStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:3,255',
            'starting_at' => 'required|date',
            'students' => ['array', new ContactFromUser],
            'evaluators' => ['array', new ContactFromUser],
        ];
    }
}
