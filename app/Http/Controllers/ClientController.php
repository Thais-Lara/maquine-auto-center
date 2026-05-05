<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    
    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = Client::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Cliente cadastrado com sucesso!',
            'data' => $client
        ], 201);
    }

    // PUT /clients/{client}
    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Cliente atualizado com sucesso!',
            'data' => $client
        ], 200);
    }

    // DELETE /clients/{client}
    public function destroy(Client $client): JsonResponse
    {
        $client->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cliente removido do sistema.',
        ], 200);
    }
}