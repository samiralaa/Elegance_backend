<?php

namespace App\Services\Discount;

use App\Models\Discount;
use App\Traits\ApiResponse;
use App\Traits\DiscountValidation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class DiscountService
{
    use ApiResponse, DiscountValidation;

    public function index(): Collection
    {
        $discounts = Discount::with(['product', 'category'])->get();
        $discounts->each(function ($discount) {
            $discount->is_active = $this->isDiscountActive($discount);
        });
        return $discounts;
    }

    public function store(array $data): ?Discount
    {
        if ($this->validateOverlappingDiscount($data)) {
            return null;
        }

        if (isset($data['duration'])) {
            $data['end_date'] = Carbon::parse($data['start_date'])
                ->addDays($data['duration']);
        }

        $discount = Discount::create($data);
        $discount->is_active = $this->isDiscountActive($discount);
        return $discount;
    }

    public function show(int $id): ?Discount
    {
        $discount = Discount::with(['product', 'category'])->find($id);
        if ($discount) {
            $discount->is_active = $this->isDiscountActive($discount);
        }
        return $discount;
    }

    public function update(int $id, array $data): ?Discount
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return null;
        }

        if ($this->validateOverlappingDiscount($data, $id)) {
            return null;
        }

        if (isset($data['duration'])) {
            $data['end_date'] = Carbon::parse($data['start_date'] ?? $discount->start_date)
                ->addDays($data['duration']);
        }

        $discount->update($data);
        $discount = $discount->fresh(['product', 'category']);
        $discount->is_active = $this->isDiscountActive($discount);
        return $discount;
    }

    public function destroy(int $id): bool
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return false;
        }

        return $discount->delete();
    }
}