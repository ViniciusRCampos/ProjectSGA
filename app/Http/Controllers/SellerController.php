<?php

namespace App\Http\Controllers;

use App\Service\SellerService;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private $SellerService;
    public function __construct(SellerService $SellerService)
    {
        $this->SellerService = $SellerService;
    }

    public function getSellers($storeId){
        $sellerList = $this->SellerService->getSellers($storeId);
        return $sellerList;
    }

    public function addNewSeller(Request $request){
        $newSeller = $this->SellerService->addNewSeller($request->only([
            'name', 'cpf', 'active', 'storeId'
        ]));
        return $newSeller;
    }

    
}
