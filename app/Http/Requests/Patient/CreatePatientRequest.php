<?php

namespace App\Http\Requests\Patient;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\CustomeValidationException;

class CreatePatientRequest extends FormRequest
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
            'insurance_number' => ['required' , 'numeric' ] ,
            'type_of_insurance' => ['required' , 'in:government,private'] ,
            'medical_history' => ['nullable']
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
