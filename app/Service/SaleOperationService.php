<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\SaleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class SaleOperationService
{

    private $responseProvider;
    private $saleRepository;

    public function __construct(
        ResponseProvider $responseProvider,
        SaleRepository $saleRepository
    ) {
        $this->responseProvider = $responseProvider;
        $this->saleRepository = $saleRepository;
    }

    private function prepareSaleData(array $data): array{
        $saleData = [
            "client_id" => $data['clientId'],
            "store_id" => $data['storeId'],
            "seller_id" => $data['sellerId'],
            "payment_id" => $data['paymentId'],
            "total_itens" => $data['totalItens'],
            "total_price" => $data['totalPrice'],
            "observation" => $data["observation"],
        ];
        return $saleData;
    }

    public function registerSale(array $data, array $summary): JsonResponse
    {
        try {
            $saleData = $this->prepareSaleData($data);
            $sale = $this->saleRepository->createWithSummary($saleData, $summary);
            return $this->responseProvider->success($sale, 'Registered sale', 201);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
