<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return AlertResource::collection($alerts);
    }

    public function store(AlertRequest $request)
    {
        $alert = Alert::create($request->validated());
        return new AlertResource($alert);
    }

    public function show(int $id)
    {
        $alert = Alert::find($id);

        if(!$alert) {
            return [
                "error" => true,
                "message" => "L'alerte n'existe pas"
            ];
        }

        return $alert;
    }

    public function update(AlertRequest $request, int $id)
    {
        $alert = $this->show($id);

        if($alert["error"]) {
            return $alert;
        }

        $alert->update($request->validated());
        return new AlertResource($alert);
    }

    public function destroy(int $id)
    {
        $alert = $this->show($id);

        if($alert["error"]) {
            return $alert;
        }

        $alert->delete();
        return response()->noContent();
    }
}
