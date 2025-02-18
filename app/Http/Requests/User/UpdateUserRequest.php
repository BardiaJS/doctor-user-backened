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
            "first_name" => 'required|regex:/^\S*$/u' ,
            "last_name" => 'required|regex:/^\S*$/u' ,
            "password" => 'required|min:6' ,
            "national_id" => ['required' , Rule::unique('user' , 'national_id')] ,
        ];
    }
}
