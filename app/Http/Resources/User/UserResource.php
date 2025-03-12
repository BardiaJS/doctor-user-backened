<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $is_doctor = false;
        if($this->is_doctor == 1){
            $is_doctor = true;
        }
        return [
            'nationalId' => $this->national_id,
            'firstName' => $this->first_name ,
            'lastName' => $this->last_name ,
            'isDoctor' => $is_doctor
        ];
    }
}
