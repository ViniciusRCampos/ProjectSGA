<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleOperationRequest;
use App\Service\SaleOperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaleOperationController extends Controller
{
    private $saleOperationService;

    public function __construct(SaleOperationService $saleOperationService)
    {
        $this->saleOperationService = $saleOperationService;
    }
    /**
     * Function to register a new sale
     * @param \App\Http\Requests\SaleOperationRequest $request
     * @return JsonResponse
     */
    public function registerSale(SaleOperationRequest $request): JsonResponse
    {
        $sale = $this->saleOperationService->registerSale($request->only([
            "clientId",
            "storeId",
            "sellerId",
            "paymentId",
            "totalItens",
            "totalPrice",
            "observation"
        ]), $request->summary);
        return $sale;
    }
}
