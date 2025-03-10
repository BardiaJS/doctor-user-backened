<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
        return [
            'national_id' => ['required' , Rule::unique('users' , 'national_id')] ,
            'first_name' => ['required' , 'regex:/^[A-Za-z]+$/'] ,
            'last_name' => ['required' , 'regex:/^[A-Za-z]+$/'] ,
            'password' => ['required' , 'min:6'],
        ];
    }
}
