<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class ProductController extends Controller
{
    use ApiResponseTrait;
    
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->successResponse($this->productService->getProducts());
    }

    public function latestProducts()
    {
        return $this->successResponse($this->productService->getLatestProducts());
    }
    public function show($id)
    {
        return $this->successResponse($this->productService->getOneProduct($id));
    }

    public function store(ProductRequest $request)
    {
        return $this->successResponse($this->productService->createProduct($request));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->productService->updateProduct($request, $id));
    }

    public function destroy($id)
    {
        return $this->successResponse($this->productService->deleteProduct($id));
    }
}
