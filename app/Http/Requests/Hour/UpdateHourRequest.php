<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\CustomeValidationException;

class UpdateHourRequest extends FormRequest
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
            "12:00_12:15" => ['sometimes' , "string"],
            "12:15_12:30" => ['sometimes' , "string"],
            "12:30_12:45" => ['sometimes' , "string"],
            "12:45_13:00" => ['sometimes' , "string"],
            "13:00_13:15" => ['sometimes' , "string"],
            "13:15_13:30" => ['sometimes' , "string"],
            "13:30_13:45" => ['sometimes' , "string"],
            "13:45_14:00" => ['sometimes' , "string"],
            "14:00_14:15" => ['sometimes' , "string"],
            "14:15_14:30" => ['sometimes' , "string"],
            "14:30_14:45" => ['sometimes' , "string"],
            "14:45_15:00" => ['sometimes' , "string"],
            "15:00_15:15" => ['sometimes' , "string"],
            "15:15_15:30" => ['sometimes' , "string"],
            "15:30_15:45" => ['sometimes' , "string"],
            "15:45_16:00" => ['sometimes' , "string"],
            "16:00_16:15" => ['sometimes' , "string"],
            "16:15_16:30" => ['sometimes' , "string"],
            "16:30_16:45" => ['sometimes' , "string"],
            "16:45_17:00" => ['sometimes' , "string"],
            "17:00_17:15" => ['sometimes' , "string"],
            "17:15_17:30" => ['sometimes' , "string"],
            "17:30_17:45" => ['sometimes' , "string"],
            "17:45_18:00" => ['sometimes' , "string"],
            "18:00_18:15" => ['sometimes' , "string"],
            "18:15_18:30" => ['sometimes' , "string"],
            "18:30_18:45" => ['sometimes' , "string"],
            "18:45_19:00" => ['sometimes' , "string"],
            "19:00_19:15" => ['sometimes' , "string"],
            "19:15_19:30" => ['sometimes' , "string"],
            "19:30_19:45" => ['sometimes' , "string"],
            "19:45_20:00" => ['sometimes' , "string"],
            "20:00_20:15" => ['sometimes' , "string"],
            "20:15_20:30" => ['sometimes' , "string"],
            "20:30_20:45" => ['sometimes' , "string"],
            "20:45_21:00" => ['sometimes' , "string"],
            "21:00_21:15" => ['sometimes' , "string"],
            "21:15_21:30" => ['sometimes' , "string"],
            "21:30_21:45" => ['sometimes' , "string"],
            "21:45_22:00" => ['sometimes' , "string"],
            "22:00_22:15" => ['sometimes' , "string"],
            "22:15_22:30" => ['sometimes' , "string"],
            "22:30_22:45" => ['sometimes' , "string"],
            "22:45_23:00" => ['sometimes' , "string"],
            "23:00_23:15" => ['sometimes' , "string"],
            "23:15_23:30" => ['sometimes' , "string"],
            "23:30_23:45" => ['sometimes' , "string"],
            "23:45_00:00"  => ['sometimes' , "string"],
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
