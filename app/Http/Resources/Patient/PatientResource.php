<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id , 
            'userId' => $this->user_id ,
            'insuranceNumber' => $this->insurance_number,
            'insuranceType' => $this->type_of_insurance ,
            'medicalHistory' => $this->medical_history
        ];
    }
}
