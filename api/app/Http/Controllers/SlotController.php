<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Resources\SlotResource;
use App\Http\Requests\StoreSlotRequest;

class SlotController extends Controller
{
    public function index()
    {
        return SlotResource::collection(Slot::all());
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

    public function store(StoreSlotRequest $request)
    {
        $slot = Slot::create($request->validated());

        return new SlotResource($slot);
    }

    public function update(StoreSlotRequest $request, int $id)
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
