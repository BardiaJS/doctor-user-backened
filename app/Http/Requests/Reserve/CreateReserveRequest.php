<?php

namespace App\Http\Requests\Reserve;

use Illuminate\Foundation\Http\FormRequest;

class CreateReserveRequest extends FormRequest
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
            'date' => ['required' , 'date' , 'date_format:d-m-Y' , 'regex:/\d{1,2}-\d{1,2}-\d{4}/'],
            'hour' =>['required' , 'string' , 'in:12:00_12:15,12:15_12:30,12:30_12:45,12:45_13:00,13:00_13:15,13:15_13:30,13:30_13:45,13:45_14:00,14:00_14:15,14:15_14:30,14:30_14:45,14:45_15:00,15:00_15:15,15:15_15:30,15:30_15:45,15:45_16:00,16:00_16:15,16:15_16:30,16:30_16:45,16:45_17:00,17:00_17:15,17:15_17:30,17:30_17:45,17:45_18:00,18:00_18:15,18:15_18:30,18:30_18:45,18:45_19:00,19:00_19:15,19:15_19:30,19:30_19:45,19:45_20:00,20:00_20:15,20:30_20:45,20:45_21:00,21:00_21:15,21:15_21:30,21:30_21:45,21:45_22:00,22:15_22:30,22:30_22:45,22:45_23:00,23:00_23:15,23:30_23:45,23:45_00:00']
        ];
    }
}
