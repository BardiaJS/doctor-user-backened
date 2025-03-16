<?php

namespace App\Http\Requests\Time;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeRequest extends FormRequest
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
            'date' => ['sometimes' , 'date' , 'date_format:d-m-Y' , 'regex:/\d{1,2}-\d{1,2}-\d{4}/' , Rule::unique('times' , 'date')]
        ];
    }
}
