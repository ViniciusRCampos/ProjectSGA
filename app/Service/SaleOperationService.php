<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\SaleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
    /**
     * Function to prepare data for use
     * @param array $data
     * @return array{client_id: int, observation: mixed, payment_id: int, seller_id: int, store_id: int, total_itens: int, total_price: float}
     */
    private function prepareSaleData(array $data): array
    {
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
    /**
     * Registers a new sale based on the data received
     * @param array $data
     * @param array $summary
     * @return JsonResponse|mixed
     */
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
