<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Service\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Receives a request and sends it to add a new product
     * @param \App\Http\Requests\ProductRequest $request
     * @return JsonResponse
     */
    public function addNewProduct(ProductRequest $request): JsonResponse
    {
        $product = $this->productService->addNewProduct($request->only([
            "name",
            "description",
            "color",
            "active",
            "price"
        ]));
        return $product;
    }

    /**
     * Search for the product according to the id provided
     * @param int $productId
     * @return JsonResponse
     */
    public function getProductById(int $productId): JsonResponse
    {
        $product = $this->productService->getProductById($productId);
        return $product;
    }

    /**
     * Updates the product data entered
     * @param \App\Http\Requests\ProductRequest $request
     * @param int $productId
     * @return JsonResponse
     */
    public function updateProduct(ProductRequest $request,int $productId): JsonResponse
    {
        $data = $request->only([
            "name",
            "description",
            "color",
            "active",
            "price"
        ]);
        $data = array_merge($data, ['id' => $productId]);
        $product = $this->productService->updateProduct($data);
        return $product;
    }
}
