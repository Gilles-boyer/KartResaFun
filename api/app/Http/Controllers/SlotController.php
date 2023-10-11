<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Resources\SlotResource;
use App\Http\Requests\SlotRequest;
use App\Http\Resources\SlotReservation;

class SlotController extends Controller
{
    public function index()
    {
        return SlotResource::collection(Slot::all());
    }

    public function getReservationSlotByDate($date)
    {
        //return SlotReservation::collection(Slot::all());
        $slots = Slot::whereHas('reservationFormula.reservation', function ($query) use ($date) {
            $query->whereDate('date', $date);
        })->orderBy('start_time')->get();

        return SlotReservation::collection($slots);
        //return SlotReservation::collection(Slot::with("reservationFormula")->get());
    }

    public function show(int $id)
    {
        $slot = Slot::find($id);

        if(!$slot) {
            return [
                "error" => true,
                "message" => "Le Client n'existe pas"
            ];
        }

        return $slot;
    }

    public function store(SlotRequest $request)
    {
        $slot = Slot::create($request->validated());

        return new SlotResource($slot);
    }

    public function update(SlotRequest $request, int $id)
    {
        $slot = $this->show($id);

        if($slot["error"]) {
            return $slot;
        }

        $slot->update($request->validated());

        return new SlotResource($slot);
    }

    public function destroy(int $id)
    {
        $slot = $this->show($id);

        if($slot["error"]) {
            return $slot;
        }

        $slot->delete();

        return response()->noContent();
    }
}
