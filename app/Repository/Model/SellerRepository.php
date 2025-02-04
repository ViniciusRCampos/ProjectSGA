<?php

namespace App\Repository\Model;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;

class SellerRepository extends ModelRepository
{
    public function __construct(Seller $seller)
    {
        parent::__construct($seller);
    }

    public function getSellersByStoreId($storeId): Collection
    {
        $sellers = $this->model->where('store_id', $storeId)->get();
        return $sellers;
    }
}
