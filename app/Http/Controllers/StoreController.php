<?php

namespace App\Http\Controllers;

use App\Service\StoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function addNewStore(Request $request): JsonResponse
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
}
