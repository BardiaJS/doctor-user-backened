<?php

namespace App\Http\Resources\Time;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'doctor_id' => $this->doctor_id,
            'day' => $this->day ,
            'month' => $this->month,
            'year'=> $this->year
        ];
    }
}
