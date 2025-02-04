<?php

namespace App\Repository\Model;

use App\Models\Sale;

class SaleRepository extends ModelRepository
{
    public function __construct(Sale $sale)
    {
        parent::__construct($sale);
    }
}