<?php

namespace App\Repository\Model;

use App\Models\Seller;

class SellerRepository extends ModelRepository
{
    public function __construct(Seller $seller)
    {
        parent::__construct($seller);
    }

}