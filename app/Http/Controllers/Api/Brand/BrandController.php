<?php

namespace App\Http\Controllers\Api\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\Brand\BrandService;
use App\Traits\ApiResponseTrait;

class BrandController extends Controller
{
    use ApiResponseTrait;

    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * Get all brands
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $brands = $this->brandService->getAllBrands();
            return $this->successResponse($brands);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Get a specific brand
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try {
            $brand = $this->brandService->getBrandById($id);
            return $this->successResponse($brand);
        } catch (\Exception $e) {
            return $this->notFoundResponse('Brand not found');
        }
    }

    /**
     * Create a new brand
     *
     * @param BrandRequest $request
     * @return JsonResponse
     */
    public function store(BrandRequest $request)
    {
        try {
            $brand = $this->brandService->createBrand($request->validated());
            return $this->createdResponse($brand);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Update a brand
     *
     * @param BrandRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(BrandRequest $request, int $id)
    {
        try {
            $brand = $this->brandService->updateBrand($id, $request->validated());
            return $this->successResponse($brand, 'Brand updated successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Delete a brand
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $this->brandService->deleteBrand($id);
            return $this->deletedResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
