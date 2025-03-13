<?php

namespace App\Http\Requests\Time;

use Illuminate\Foundation\Http\FormRequest;

class CreateTimeRequest extends FormRequest
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
            'day' => ['numeric' , 'min:1' , 'max:31'] ,
            'month'=> ['in:January, February, March, April, May, June, July, August, September, October, November,  December , january, february, march, april, may, june, july, august, september, october, november, december'] ,
            'year' => ['numeric' , 'min:1990' , 'max:2025'] 
        ];
    }
}
