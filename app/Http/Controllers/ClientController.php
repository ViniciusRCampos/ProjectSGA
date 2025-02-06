<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Service\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    /**
     * Receives the request to request the registration of a new customer
     * @param \App\Http\Requests\ClientRequest $request
     * @return JsonResponse
     */
    public function addNewClient(ClientRequest $request): JsonResponse
    {
        $response = $this->clientService->addNewClient($request->only(["name", "email", "cpf", "genderId", "active"]));
        return $response;
    }

    /**
     * Search for a customer based on the id entered
     * @param int $clientId
     * @return JsonResponse
     */
    public function getClientById(int $clientId): JsonResponse
    {
        $client = $this->clientService->getClientById($clientId);
        return $client;
    }

    /**
     * Receives a request with data for updating a client informed by id
     * @param \App\Http\Requests\ClientRequest $request
     * @param int $clientId
     * @return JsonResponse
     */
    public function updateClient(ClientRequest $request,int $clientId): JsonResponse
    {
        $data = $request->only('name', 'cpf', 'email', 'genderId', 'active');
        $data = array_merge($data, ['id' => $clientId]);
        $client = $this->clientService->updateClient($data);
        return $client;
    }
}
