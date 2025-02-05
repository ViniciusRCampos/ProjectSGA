<?php

namespace App\Http\Controllers;

use App\Service\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }
    public function index(){
        $data = $this->saleService->getData();
        return view("home")->with("data", $data);
    }

    public function showReport(){
        $data = $this->saleService->getReportData();
        return view("report")->with("data", $data);
    }

}
