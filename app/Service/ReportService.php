<?php

namespace App\Service;

use App\Providers\ResponseProvider;
use App\Repository\Model\SaleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ReportService
{
    private $responseProvider;
    private $saleRepository;

    public function __construct(ResponseProvider $responseProvider, SaleRepository $saleRepository)
    {
        $this->responseProvider = $responseProvider;
        $this->saleRepository = $saleRepository;
    }

    public function getFilteredReport(array $data): JsonResponse
    {
        try {
            $tableData = $this->saleRepository->getReportData($data);
            return $this->responseProvider->success($tableData, '', 200);
        } catch (\Throwable $e) {
            Log::error($e->getMessage(), $data);
            return $this->responseProvider->error($e->getCode());
        }
    }
}
