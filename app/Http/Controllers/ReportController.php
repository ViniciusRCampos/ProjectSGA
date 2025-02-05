<?php

namespace App\Http\Controllers;

use App\Service\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;
    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function getFilteredReport(Request $request): JsonResponse
    {
        $tableData = $this->reportService->getFilteredReport($request->only("date", "clientId", "storeId", "sellerId"));
        return $tableData;
    }
}
