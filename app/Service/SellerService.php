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

    public function getSellers(int $storeId): JsonResponse
    {
        try {
            $sellers = $this->sellerRepository->getSellersByStoreId($storeId);
            return $this->responseProvider->success($sellers, 'Sellers Found', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), ['storeId' => $storeId]);
            return $this->responseProvider->error( $e->getCode());
        }
    }
}
