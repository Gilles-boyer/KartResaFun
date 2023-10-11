<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\FormulaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationSimpleResource extends JsonResource
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
            'client_id' => $this->client_id,
            'date' => $this->date,
            'number_of_adults' => $this->number_of_adults,
            'number_of_children' => $this->number_of_children,
            'number_of_biplace' => $this->number_of_biplace,
            'status' => $this->status,
        ];
    }
}
