<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProductService
{
    private $productRepository;
    private $responseProvider;

    public function __construct(ProductRepository $productRepository, ResponseProvider $responseProvider)
    {
        $this->productRepository = $productRepository;
        $this->responseProvider = $responseProvider;
    }

    public function addNewProduct(array $data): JsonResponse
    {
        try {
            $product = $this->productRepository->create($data);
            return $this->responseProvider->success($product, "Product registered", 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
