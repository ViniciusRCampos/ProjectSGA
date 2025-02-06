<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\ClientRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ClientService
{
    private $clientRepository;
    private $responseProvider;

    public function __construct(ClientRepository $clientRepository, ResponseProvider $responseProvider)
    {
        $this->clientRepository = $clientRepository;
        $this->responseProvider = $responseProvider;
    }
    /**
     * Organizes data to match a client's fields
     * @param array $data
     * @return array{CPF: int, active: boolean, email: string, gender_id: int, name: string}
     */
    private function prepareDataArray(array $data)
    {
        $data = [
            'name' => $data['name'],
            'CPF' => $data['cpf'],
            'gender_id' => $data['genderId'],
            'email' => $data['email'],
            'active' => $data['active'],
        ];
        return $data;
    }
    /**
     * Function responsible for sending new customer data for registration
     * @param array $data
     * @return JsonResponse
     */
    public function addNewClient(array $data): JsonResponse
    {
        try {
            $newClientData = $this->prepareDataArray($data);
            $client = $this->clientRepository->create($newClientData);
            return $this->responseProvider->success($client, 'Client created with success', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }

    /**
     * Searches for a customer's data according to the id provided
     * @param int $clientId
     * @return JsonResponse
     */
    public function getClientById(int $clientId): JsonResponse
    {
        try {
            $client = $this->clientRepository->find($clientId);
            return $this->responseProvider->success($client, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), [$clientId]);
            return $this->responseProvider->error($e->getCode());
        }
    }

    /**
     * Update a customer's data
     * @param array $data
     * @return JsonResponse|mixed
     */
    public function updateClient(array $data): JsonResponse
    {
        try {
            $clientData = $this->prepareDataArray($data);
            $client = $this->clientRepository->update($data['id'], $clientData);
            return $this->responseProvider->success($client, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
