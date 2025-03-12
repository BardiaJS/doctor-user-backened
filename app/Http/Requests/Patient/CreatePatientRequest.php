<?php

namespace App\Http\Requests\Patient;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
            'user_id' => [Rule::unique('patients' , 'user_id')],
            'insurance_number' => ['required' , 'numeric' ] ,
            'type_of_insurance' => ['required' , 'in:government,private'] ,
            'medical_history' => ['nullable']
        ];
    }
}
