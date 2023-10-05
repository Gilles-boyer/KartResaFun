<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'client' => new ClientResource($this->client),
            'date' => $this->date,
            'status' => $this->status,
            'comment' => $this->comment,
        ];
    }
}
