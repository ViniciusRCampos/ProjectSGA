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

    private function prepareNewSellerData(array $data)
    {
        $newSellerData = [
            "name" => $data["name"],
            "CPF" => $data["cpf"],
            "active" => $data["active"],
            "store_id" => $data["storeId"],
        ];
        return $newSellerData;
    }

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

    public function addNewSeller(array $data): JsonResponse
    {
        try {
            $newSellerData = $this->prepareNewSellerData($data);
            $newSeller = $this->sellerRepository->create($newSellerData);
            return $this->responseProvider->success($newSeller, 'Seller created with success', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
