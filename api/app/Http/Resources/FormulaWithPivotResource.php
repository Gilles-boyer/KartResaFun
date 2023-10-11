<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\ReservationFormula;
use App\Models\Slot;
use Illuminate\Http\Resources\Json\JsonResource;

class FormulaWithPivotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $reservationFormula = ReservationFormula::find($this->pivot->id);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'number_of_sessions' => $this->number_of_sessions,
            'number_of_people' => $this->pivot->number_of_people,
            'pivot' => $this->pivot,
            'slot' => SlotResource::collection($reservationFormula->slots)
        ];
    }
}
