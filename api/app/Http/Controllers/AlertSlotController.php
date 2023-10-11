<?php

namespace App\Http\Controllers;

use App\Models\AlertSlot;
use Illuminate\Http\Request;

class AlertSlotController extends Controller
{
    public function index()
    {
        $alertSlots = AlertSlot::all();
        return AlertSlotResource::collection($alertSlots);
    }

    public function store(AlertSlotRequest $request)
    {
        $alertSlot = AlertSlot::create($request->validated());
        return new AlertSlotResource($alertSlot);
    }

    public function show(int $id)
    {
        $alertSlot = AlertSlot::find($id);

        if(!$alertSlot) {
            return [
                "error" => true,
                "message" => "L'Alerte Slot n'existe pas"
            ];
        }

        return $alertSlot;
    }

    public function update(AlertSlotRequest $request, int $id)
    {
        $alertSlot = $this->show($id);

        if($alertSlot["error"]) {
            return $alertSlot;
        }

        $alertSlot->update($request->validated());
        return new AlertSlotResource($alertSlot);
    }

    public function destroy(int $id)
    {
        $alertSlot = $this->show($id);

        if($alertSlot["error"]) {
            return $alertSlot;
        }

        $alertSlot->delete();
        return response()->noContent();
    }
}
