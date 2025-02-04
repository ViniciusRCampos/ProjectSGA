<?php

namespace App\Repository\Model;

use App\Models\Store;

class StoreRepository extends ModelRepository
{
    public function __construct(Store $store)
    {
        parent::__construct($store);
    }
}