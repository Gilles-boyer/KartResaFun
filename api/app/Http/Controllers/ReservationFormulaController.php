<?php

namespace App\Http\Controllers;

use App\Models\ReservationFormula;
use App\Http\Requests\StoreReservationFormulaRequest;
use App\Http\Resources\ReservationFormulaResource;
use Illuminate\Http\Request;

class ReservationFormulaController extends Controller
{
    public function index()
    {
        return ReservationFormulaResource::collection(ReservationFormula::all());
    }

    public function show(int $id)
    {
        $reservationFormula = ReservationFormula::find($id);

        if(!$reservationFormula) {
            return [
                "error" => true,
                "message" => "Le Client n'existe pas"
            ];
        }

        return $reservationFormula;
    }

    public function store(StoreReservationFormulaRequest $request)
    {
        $reservationFormula = ReservationFormula::create($request->validated());

        return new ReservationFormulaResource($reservationFormula);
    }

    public function update(StoreReservationFormulaRequest $request, int $id)
    {
        $reservationFormula = $this->show($id);

        if($reservationFormula["error"]) {
            return $reservationFormula;
        }

        $reservationFormula->update($request->validated());

        return new ReservationFormulaResource($reservationFormula);
    }

    public function destroy(int $id)
    {
        $reservationFormula = $this->show($id);

        if($reservationFormula["error"]) {
            return $reservationFormula;
        }

        $reservationFormula->delete();

        return response()->noContent();
    }

}
