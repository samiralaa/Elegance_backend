<?php

namespace App\Http\Controllers\Api\Discount;

use App\Http\Controllers\Controller;
use App\Services\Discount\DiscountService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    use ApiResponse;

    public function __construct(protected DiscountService $discountService)
    {}

    public function index(): JsonResponse
    {
        $discounts = $this->discountService->index();
        return $this->successResponse($discounts);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date|after_or_equal:today',
            'duration' => 'nullable|integer|min:1',
            'discount_value' => 'required|numeric|min:0|max:100',
            'is_active' => 'boolean',
            'product_id' => 'nullable|exists:products,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        if (!$request->product_id && !$request->category_id) {
            return $this->errorResponse('Either product_id or category_id must be provided', 422);
        }

        if ($request->product_id && $request->category_id) {
            return $this->errorResponse('Cannot apply discount to both product and category', 422);
        }

        $discount = $this->discountService->store($request->all());
        if (!$discount) {
            return $this->errorResponse('An overlapping discount already exists for this period', 422);
        }

        return $this->successResponse($discount, 'Discount created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $discount = $this->discountService->show($id);
        if (!$discount) {
            return $this->errorResponse('Discount not found', 404);
        }

        return $this->successResponse($discount);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'date|after_or_equal:today',
            'duration' => 'nullable|integer|min:1',
            'discount_value' => 'numeric|min:0|max:100',
            'is_active' => 'boolean',
            'product_id' => 'nullable|exists:products,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        if ($request->has('product_id') && $request->has('category_id')) {
            return $this->errorResponse('Cannot apply discount to both product and category', 422);
        }

        $existingDiscount = $this->discountService->show($id);
        if (!$existingDiscount) {
            return $this->errorResponse('Discount not found', 404);
        }

        $discount = $this->discountService->update($id, $request->all());
        if (!$discount) {
            return $this->errorResponse('An overlapping discount already exists for this period', 422);
        }

        return $this->successResponse($discount, 'Discount updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        if (!$this->discountService->destroy($id)) {
            return $this->errorResponse('Discount not found', 404);
        }

        return $this->successResponse(null, 'Discount deleted successfully');
    }
}