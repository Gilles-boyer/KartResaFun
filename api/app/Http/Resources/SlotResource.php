<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SlotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reservation_formula_id' => $this->reservation_formula_id,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'status' => $this->status,
        ];
    }
}
