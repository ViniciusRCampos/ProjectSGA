<?php

namespace App\Service;

use App\Repository\Model\ClientRepository;
use App\Repository\Model\ProductRepository;
use App\Repository\Model\SaleRepository;
use App\Repository\Model\SellerRepository;
use App\Repository\Model\StoreRepository;

class SaleService {

    private $saleRepository;
    private $storeRepository;
    private $productRepository;
    private $clientRepository;
    private $sellerRepository;
    public function __construct(SaleRepository $saleRepository, StoreRepository $storeRepository, ProductRepository $productRepository,
    ClientRepository $clientRepository, SellerRepository $sellerRepository) {
        $this->saleRepository = $saleRepository;
        $this->storeRepository = $storeRepository;
        $this->productRepository = $productRepository;
        $this->clientRepository = $clientRepository;
        $this->sellerRepository = $sellerRepository;
    }

    public function getData() {
        $data = [
            'clients' => $this->clientRepository->all(),
            'stores' => $this->storeRepository->all(),
            'products' => $this->productRepository->all(),
        ];
        return $data;
    }
}