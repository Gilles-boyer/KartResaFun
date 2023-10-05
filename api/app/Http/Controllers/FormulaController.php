<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Http\Requests\FormulaRequest;
use App\Http\Resources\FormulaResource;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    public function index()
    {
        $formulas = Formula::all();
        return FormulaResource::collection($formulas);
    }

    public function store(FormulaRequest $request)
    {
        $formula = Formula::create($request->validated());
        return new FormulaResource($formula);
    }

    public function show(int $id)
    {
        $formula = Formula::find($id);

        if(!$formula) {
            return [
                "error" => true,
                "message" => "Le Client n'existe pas"
            ];
        }

        return $formula;
    }

    public function update(FormulaRequest $request, int $id)
    {
        $formula = $this->show($id);

        if($formula["error"]) {
            return $formula;
        }

        $formula->update($request->validated());
        return new FormulaResource($formula);
    }

    public function destroy(int $id)
    {
        $formula = $this->show($id);

        if($formula["error"]) {
            return $formula;
        }

        $formula->delete();
        return response()->noContent();
    }
}
