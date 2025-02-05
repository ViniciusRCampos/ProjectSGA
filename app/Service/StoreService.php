<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\StoreRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class StoreService
{

    private $storeRepository;
    private $responseProvider;

    public function __construct(
        StoreRepository $storeRepository,
        ResponseProvider $responseProvider
    ) {
        $this->storeRepository = $storeRepository;
        $this->responseProvider = $responseProvider;
    }

    private function prepareNewStoreData(array $data)
    {
        $data = [
            "name" => $data['name'],
            "CNPJ" => $data['cnpj'],
            "CEP" => $data['cep'],
            "address" => $data['address'],
            "district" => $data['district'],
            "city" => $data['city'],
            "state" => $data['state'],
            "active" => $data['active']
        ];
        return $data;
    }
    public function addNewStore(array $data): JsonResponse
    {
        try {
            $newStoreData = $this->prepareNewStoreData($data);
            $store = $this->storeRepository->create($newStoreData);
            return $this->responseProvider->success($store, 'Store created with success', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
