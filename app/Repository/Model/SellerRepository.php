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
    /**
     * Search for sellers who are linked to the store with the specified id
     * @param int $storeId
     * @return Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getSellersByStoreId(int $storeId): Collection
    {
        $sellers = $this->model->where('store_id', $storeId)->get();
        return $sellers;
    }
}
