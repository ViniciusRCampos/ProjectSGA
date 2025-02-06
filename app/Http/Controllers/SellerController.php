<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Service\SellerService;
use Illuminate\Http\JsonResponse;

class SellerController extends Controller
{
    private $sellerService;
    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }
    /**
     * Search all sellers in the specified store
     * @param int $storeId
     * @return JsonResponse
     */
    public function getSellers(int $storeId): JsonResponse
    {
        $sellerList = $this->sellerService->getSellers($storeId);
        return $sellerList;
    }
    /**
     * Receive a request to add a new seller
     * @param \App\Http\Requests\SellerRequest $request
     * @return JsonResponse
     */
    public function addNewSeller(SellerRequest $request): JsonResponse
    {
        $newSeller = $this->sellerService->addNewSeller($request->only([
            'name',
            'cpf',
            'active',
            'storeId'
        ]));
        return $newSeller;
    }
    /**
     * Search for a seller according to the id entered
     * @param int $sellerId
     * @return JsonResponse
     */
    public function getSellerById(int $sellerId): JsonResponse
    {
        $seller = $this->sellerService->getSellerById($sellerId);
        return $seller;
    }

    /**
     * Updates a seller's information based on the received array and the provided id 
     * @param \App\Http\Requests\SellerRequest $request
     * @param mixed $sellerId
     * @return JsonResponse
     */
    public function updateSeller(SellerRequest $request, $sellerId)
    {
        $data = $request->only('name', 'cpf', 'storeId', 'active');
        $data = array_merge($data, ['id' => $sellerId]);
        $seller = $this->sellerService->updateSeller($data);
        return $seller;
    }
}
