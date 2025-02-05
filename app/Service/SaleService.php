<?php

namespace App\Service;

use App\Repository\Model\ClientRepository;
use App\Repository\Model\GenderRepository;
use App\Repository\Model\PaymentMethodRepository;
use App\Repository\Model\ProductRepository;
use App\Repository\Model\SaleRepository;
use App\Repository\Model\SellerRepository;
use App\Repository\Model\StoreRepository;

class SaleService
{

    private $saleRepository;
    private $storeRepository;
    private $productRepository;
    private $clientRepository;
    private $sellerRepository;
    private $genderRepository;
    private $paymentMethodRepository;
    public function __construct(
        SaleRepository $saleRepository,
        StoreRepository $storeRepository,
        ProductRepository $productRepository,
        ClientRepository $clientRepository,
        SellerRepository $sellerRepository,
        GenderRepository $genderRepository,
        PaymentMethodRepository $paymentMethodRepository
    ) {
        $this->saleRepository = $saleRepository;
        $this->storeRepository = $storeRepository;
        $this->productRepository = $productRepository;
        $this->clientRepository = $clientRepository;
        $this->sellerRepository = $sellerRepository;
        $this->genderRepository = $genderRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;

    }

    public function getData()
    {
        $data = [
            'clients' => $this->clientRepository->all(),
            'stores' => $this->storeRepository->all(),
            'products' => $this->productRepository->all(),
            'genders' => $this->genderRepository->getActives(),
            'paymentMethods' => $this->paymentMethodRepository->getActives(),
        ];
        return $data;
    }

    public function getReportData() 
    {
        $data = [
            'clients' => $this->clientRepository->all(),
            'stores' => $this->storeRepository->all(),
            'sales' => $this->saleRepository->all(),
            'sellers' => $this->sellerRepository->all(),
            'tableData' => $this->saleRepository->getReportData(),
        ];

        return $data;
    }
}
