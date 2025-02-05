<?php

namespace App\Http\Controllers;

use App\Service\SellerService;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private $sellerService;
    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    public function getSellers($storeId){
        $sellerList = $this->sellerService->getSellers($storeId);
        return $sellerList;
    }

    public function addNewSeller(Request $request){
        $newSeller = $this->sellerService->addNewSeller($request->only([
            'name', 'cpf', 'active', 'storeId'
        ]));
        return $newSeller;
    }

    public function getSellerById($sellerId){
        $seller = $this->sellerService->getSellerById($sellerId);
        return $seller;
    }

    public function updateSeller(Request $request, $sellerId){
        $data = $request->only('name', 'cpf', 'storeId', 'active');
        $data = array_merge($data, ['id' => $sellerId]);
        $seller = $this->sellerService->updateSeller($data);
        return $seller;
    }
}
