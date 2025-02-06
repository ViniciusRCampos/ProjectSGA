<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Service\StoreService;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    private $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Receives the request to request the registration of a new store
     * @param \App\Http\Requests\StoreRequest $request
     * @return JsonResponse
     */
    public function addNewStore(StoreRequest $request): JsonResponse
    {
        $store = $this->storeService->addNewStore($request->only([
            "name",
            "cnpj",
            "cep",
            "address",
            "district",
            "city",
            "state",
            "active"
        ]));

        return $store;
    }

    /**
     * Search for a store based on the id entered
     * @param mixed $storeId
     * @return JsonResponse
     */
    public function getStoreById($storeId): JsonResponse
    {
        $store = $this->storeService->getStoreById($storeId);
        return $store;
    }

    /**
     * Receives a request with data for updating a store informed by id
     * @param \App\Http\Requests\StoreRequest $request
     * @param int $storeId
     * @return JsonResponse
     */
    public function updateStore(StoreRequest $request,int $storeId): JsonResponse
    {
        $data = $request->only(
            "name",
            "cnpj",
            "cep",
            "address",
            "district",
            "city",
            "state",
            "active"
        );
        $data = array_merge($data, ['id' => $storeId]);
        $store = $this->storeService->updateStore($data);
        return $store;
    }
}
