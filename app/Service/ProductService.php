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

    /**
     * Receives an array of data to add a new product
     * @param array $data
     * @return JsonResponse
     */
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

    /**
     * Search for the product according to the id provided
     * @param int $productId
     * @return JsonResponse
     */
    public function getProductById(int $productId): JsonResponse
    {
        try {
            $product = $this->productRepository->find($productId);
            return $this->responseProvider->success($product, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), [$productId]);
            return $this->responseProvider->error($e->getCode());
        }
    }
    /**
     * Updates product information based on received data
     * @param array $data
     * @return JsonResponse
     */
    public function updateProduct(array $data): JsonResponse
    {
        try {
            $product = $this->productRepository->update($data['id'], $data);
            return $this->responseProvider->success($product, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
