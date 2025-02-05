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

    private function prepareDataArray(array $data){
        $data = [
            'name' => $data['name'],
            'CPF'=> $data['cpf'],
            'gender_id'=> $data['genderId'],
            'email' => $data['email'],
            'active'=> $data['active'],
        ];
        return $data;
    }

    public function addNewClient(array $data): JsonResponse {
        try{
            $newClientData = $this->prepareDataArray($data);
            $client = $this->clientRepository->create($newClientData);
            return $this->responseProvider->success($client, 'Client created with success', 201);
        } catch (\Throwable $e){
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}