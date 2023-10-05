<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return ReservationResource::collection($reservations);
    }

    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());
        return new ReservationResource($reservation);
    }

    public function show(int $id)
    {
        $reservation = Reservation::find($id);

        if(!$reservation) {
            return [
                "error" => true,
                "message" => "Le Client n'existe pas"
            ];
        }

        return $reservation;
    }

    public function update(ReservationRequest $request, int $id)
    {
        $reservation = $this->show($id);

        if($reservation["error"]) {
            return $reservation;
        }

        $reservation->update($request->validated());
        return new ReservationResource($reservation);
    }

    public function destroy(int $id)
    {
        $reservation = $this->show($id);

        if($reservation["error"]) {
            return $reservation;
        }

        $reservation->delete();
        return response()->noContent();
    }
}
