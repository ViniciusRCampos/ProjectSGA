<?php

namespace App\Http\Controllers;

use App\Service\SaleOperationService;
use Illuminate\Http\Request;

class SaleOperationController extends Controller
{
    private $saleOperationService;

    public function __construct(SaleOperationService $saleOperationService)
    {
        $this->saleOperationService = $saleOperationService;
    }

    public function registerSale(Request $request)
    {
        $sale = $this->saleOperationService->registerSale($request->only([
            "clientId", "storeId", "sellerId","paymentId","totalItens","totalPrice","observation"
        ]), $request->summary);
        return $sale;
    }
}
