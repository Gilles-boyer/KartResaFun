<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\FormulaResource;
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
        $formulas = [];
        if(isset($this->formulas)) {
            $formulas = $this->formulas;
        }

        return [
            'id' => $this->id,
            'client' => new ClientResource($this->client),
            'date' => $this->date,
            'number_of_adults' => $this->number_of_adults,
            'number_of_children' => $this->number_of_children,
            'number_of_biplace' => $this->number_of_biplace,
            'status' => $this->status,
            'comment' => $this->comment,
            'payments' => PaymentResource::collection($this->payments),
            'formulas' => FormulaWithPivotResource::collection($formulas)
        ];
    }
}
