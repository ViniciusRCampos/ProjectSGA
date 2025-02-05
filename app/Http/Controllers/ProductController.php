<?php

namespace App\Http\Controllers;

use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function addNewProduct(Request $request){
        $product = $this->productService->addNewProduct($request->only([
            "name",
            "description",
            "color",
            "active",
            "price"
        ]));
        return $product;
    }
}
