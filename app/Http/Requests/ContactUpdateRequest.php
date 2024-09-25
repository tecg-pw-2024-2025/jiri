<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $contact = $this->route('contact');

        return [
            'email' => [
                'required',
                'email', // You might want to ensure it's a valid email address
                Rule::unique('contacts')->ignore($contact), // Ignore current contact's ID in unique rule
            ],
            'first_name' => 'required|string|between:3,255',
            'last_name' => 'required|string|between:3,255',
        ];
    }
}
