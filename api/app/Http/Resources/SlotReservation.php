<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SlotReservation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slot_id' => $this->id,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'alerts' => AlertResource::collection($this->alerts),
            'status' => $this->status,
            'reservationFormula_id' => $this->reservationFormula->id,
            'nb_slot_booking' => count($this->reservationFormula->slots),
            'nbre_pers' => $this->reservationFormula->number_of_people,
            'reservation' => new ReservationSimpleResource($this->reservationFormula->reservation),
            'client' => new ClientResource($this->reservationFormula->reservation->client),
            'formula' => new FormulaResource($this->reservationFormula->formula),
            'nb_payments' => count($this->reservationFormula->reservation->payments),
        ];
    }
}
