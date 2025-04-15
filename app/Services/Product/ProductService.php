<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Traits\ApiResponse;
use App\Traits\CrudTrait;
use App\Http\Requests\Product\ProductRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ProductService
{
    use ApiResponse ,CrudTrait;

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function getProducts(): Collection
    {
        return $this->model->with(['images','currency','category'])->get();
  
    }

    public function getOneProduct($id): Product
    {
        return $this->model->findOrFail($id);
    }

    public function createProduct(ProductRequest $request): JsonResponse
    {
         $product = $this->model->create($request->validated());
         if ($request->hasFile('images')) {
            $product->addImages($request->file('images'));
        }
         return $this->successResponse($product);
    }

    public function updateProduct(Request $request, $id): JsonResponse
    {
        $product = $this->model->findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    public function deleteProduct($id): JsonResponse
    {
        $product = $this->model->findOrFail($id);
        return $product->delete(); 
    }
}