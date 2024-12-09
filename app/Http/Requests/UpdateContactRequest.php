<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
        $unique = Rule::unique('contacts')->ignore($this->route('contact'));

        return [
            'name' => ['required', 'string', 'min:5'],
            'contact' => ['required', 'string', 'digits:9', $unique],
            'email' => ['required', 'email', $unique],
        ];
    }
}
