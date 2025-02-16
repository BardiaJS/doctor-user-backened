<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHourRequest extends FormRequest
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
            'start_hour' => ['sometimes', 'date_format:H:i'],
            'end_hour' => ['sometimes', 'date_format:H:i'],
        ];
    }
}
