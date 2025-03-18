<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\CustomeValidationException;

class UpdatePasswordRequest extends FormRequest
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
            
            'password' => ['required' , 'min:6'],
            'new_password' => ['required' , 'min:6']
        ];
    }


    protected function failedValidation($validator)
    {
        // Retrieve the validation errors
        $errors = $validator->errors()->toArray();
        
        // Throw your custom validation exception
        throw new CustomeValidationException("Validation failed", $errors);
    }
}
