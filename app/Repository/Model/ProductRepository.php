<?php 

namespace App\Repository\Model;

use App\Models\Product;

class ProductRepository extends ModelRepository{

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

}