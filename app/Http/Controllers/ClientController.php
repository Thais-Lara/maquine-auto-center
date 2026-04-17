<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClientController extends Controller
{
    // GET /clients - Listar todos
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Lista de clientes',
            'data' => Client::all(),
        ], 200);
    }

    // POST /clients - Criar
    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = Client::create($request->validated());

        return response()->json([
            'message' => 'Cliente criado com sucesso!',
            'data' => $client,
        ], 201);
    }

    // GET /clients/{id} - Buscar por ID
    public function show(Client $client): JsonResponse
    {

        return response()->json([
            'data' => $client,
        ], 200);
    }

    // PUT /clients/{id} - Atualizar
    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());

        return response()->json([
            'message' => 'Cliente atualizado com sucesso!',
            'data' => $client,
        ], 200);
    }

    // DELETE /clients/{id} - Deletar
    public function destroy(Client $client): JsonResponse
    {
        $uuid = $client->uuid;

        $client->delete();

        return response()->json([
            'message' => 'Cliente removido do sistema.',
        ], 200);
    }
}
