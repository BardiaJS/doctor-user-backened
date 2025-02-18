<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'national_id' => ['sometimes', 'string', Rule::unique('users', 'national_id')],
            'first_name' => ['sometimes', 'string', 'regex:/^\S*$/'],
            'last_name' => ['sometimes', 'string'],
            'password' => ['sometimes', 'string', 'min:6', 'regex:/^\S*$/']
        ];
    }
}
