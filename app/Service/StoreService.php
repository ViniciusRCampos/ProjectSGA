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
    /**
     * Organizes data to match a store's fields
     * @param array $data
     * @return array{CEP: int, CNPJ: int, active: boolean, address: string, city: string, district: string, name: string, state: string}
     */
    private function prepareStoreData(array $data)
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
    /**
     * Function responsible for sending new store data for registration
     * @param array $data
     * @return JsonResponse
     */
    public function addNewStore(array $data): JsonResponse
    {
        try {
            $newStoreData = $this->prepareStoreData($data);
            $store = $this->storeRepository->create($newStoreData);
            return $this->responseProvider->success($store, 'Store created with success', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Searches for a store's data according to the id provided
     * @param int $storeId
     * @return JsonResponse
     */
    public function getStoreById(int $storeId): JsonResponse
    {
        try {
            $store = $this->storeRepository->find($storeId);
            return $this->responseProvider->success($store, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), [$storeId]);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Update a store's data
     * @param array $data
     * @return JsonResponse
     */
    public function updateStore(array $data): JsonResponse
    {
        try {
            $storeData = $this->prepareStoreData($data);
            $store = $this->storeRepository->update($data['id'], $storeData);
            return $this->responseProvider->success($store, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
