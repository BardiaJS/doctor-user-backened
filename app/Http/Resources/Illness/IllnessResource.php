<?php

namespace App\Http\Resources\Illness;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IllnessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'content' => $this->content,
            'time' => $this->time
        ];
    }
}
