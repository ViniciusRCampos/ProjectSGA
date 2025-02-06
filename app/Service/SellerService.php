<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\SellerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class SellerService
{

    private $sellerRepository;
    private $responseProvider;

    public function __construct(SellerRepository $sellerRepository, ResponseProvider $responseProvider)
    {
        $this->sellerRepository = $sellerRepository;
        $this->responseProvider = $responseProvider;
    }
    /**
     * Organizes data to match a seller's fields
     * @param array $data
     * @return array{CPF: int, active: boolean, name: string, store_id: int}
     */
    private function prepareSellerData(array $data)
    {
        $sellerData = [
            "name" => $data["name"],
            "CPF" => $data["cpf"],
            "active" => $data["active"],
            "store_id" => $data["storeId"],
        ];
        return $sellerData;
    }
    /**
     * Search all sellers in the specified store
     * @param int $storeId
     * @return JsonResponse
     */
    public function getSellers(int $storeId): JsonResponse
    {
        try {
            $sellers = $this->sellerRepository->getSellersByStoreId($storeId);
            return $this->responseProvider->success($sellers, 'Sellers Found', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), ['storeId' => $storeId]);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Receives an array to register a new seller
     * @param array $data
     * @return JsonResponse
     */
    public function addNewSeller(array $data): JsonResponse
    {
        try {
            $newSellerData = $this->prepareSellerData($data);
            $newSeller = $this->sellerRepository->create($newSellerData);
            return $this->responseProvider->success($newSeller, 'Seller created with success', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Search for a seller according to the id entered
     * @param int $sellerId
     * @return JsonResponse
     */
    public function getSellerById(int $sellerId)
    {
        try{
            $seller = $this->sellerRepository->find($sellerId);
            return $this->responseProvider->success($seller, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), [$sellerId]);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Updates a seller's information based on the received array and the provided id
     * @param array $data
     * @return JsonResponse
     */
    public function updateSeller(array $data): JsonResponse
    {
        try{
            $sellerData = $this->prepareSellerData($data);
            $seller = $this->sellerRepository->update($data['id'], $sellerData);
            return $this->responseProvider->success($seller, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
