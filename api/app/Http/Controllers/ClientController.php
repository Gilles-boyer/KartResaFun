<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return ClientResource::collection(Client::all());
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create($request->validated());
        return new ClientResource($client);
    }

    public function show(int $id)
    {
        $client = Client::find($id);

        if(!$client) {
            return [
                "error" => true,
                "message" => "Le Client n'existe pas"
            ];
        }

        return $client;
    }

    public function update(ClientRequest $request, int $id)
    {
        $client = $this->show($id);

        if($client["error"]) {
            return $client;
        }

        $client->update($request->validated());
        return new ClientResource($client);
    }

    public function destroy(int $id)
    {
        $client = $this->show($id);

        if($client["error"]) {
            return $client;
        }

        $client->delete();
        return response()->noContent();
    }
}
