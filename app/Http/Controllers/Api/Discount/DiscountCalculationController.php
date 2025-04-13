<?php

namespace App\Http\Controllers\Api\Discount;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Discount\DiscountService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountCalculationController extends Controller
{
    use ApiResponse;

    public function __construct(protected DiscountService $discountService)
    {}

    public function calculateProductPrice(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $product = Product::findOrFail($request->product_id);
        $originalPrice = $product->price * $request->quantity;

        // Get active discounts for the product and its category
        $productDiscount = $product->discounts()
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->orderBy('discount_value', 'desc')
            ->first();

        $categoryDiscount = $product->category->discounts()
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->orderBy('discount_value', 'desc')
            ->first();

        // Get the highest discount
        $bestDiscount = null;
        if ($productDiscount && $categoryDiscount) {
            $bestDiscount = $productDiscount->discount_value > $categoryDiscount->discount_value
                ? $productDiscount
                : $categoryDiscount;
        } else {
            $bestDiscount = $productDiscount ?? $categoryDiscount;
        }

        $response = [
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'original_price' => $originalPrice,
            'has_discount' => false,
            'final_price' => $originalPrice
        ];

        if ($bestDiscount) {
            $response['has_discount'] = true;
            $response['discount_value'] = $bestDiscount->discount_value;
            $response['discount_type'] = $bestDiscount->product_id ? 'product' : 'category';
            $response['final_price'] = $this->discountService->calculateDiscountedPrice(
                $originalPrice,
                $bestDiscount->discount_value
            );
        }

        return $this->successResponse($response);
    }

    public function calculateBulkPrices(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $results = [];
        foreach ($request->items as $item) {
            $innerRequest = new Request($item);
            $calculation = json_decode(
                $this->calculateProductPrice($innerRequest)->getContent(),
                true
            );
            $results[] = $calculation['data'];
        }

        $summary = [
            'total_original_price' => array_sum(array_column($results, 'original_price')),
            'total_final_price' => array_sum(array_column($results, 'final_price')),
            'total_items' => count($results),
            'items_with_discount' => count(array_filter($results, fn($item) => $item['has_discount']))
        ];

        return $this->successResponse([
            'items' => $results,
            'summary' => $summary
        ]);
    }
}