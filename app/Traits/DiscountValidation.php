<?php

namespace App\Traits;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait DiscountValidation
{
    public function validateOverlappingDiscount(array $data, ?int $excludeId = null): bool
    {
        $query = Discount::query();
        
        // Check for overlapping date range
        $startDate = Carbon::parse($data['start_date']);
        $endDate = isset($data['duration']) 
            ? $startDate->copy()->addDays($data['duration'])
            : null;

        $query->where(function (Builder $query) use ($startDate, $endDate) {
            $query->where(function (Builder $q) use ($startDate) {
                $q->where('start_date', '<=', $startDate)
                    ->where(function (Builder $q) use ($startDate) {
                        $q->whereNull('end_date')
                            ->orWhere('end_date', '>=', $startDate);
                    });
            })->orWhere(function (Builder $q) use ($startDate, $endDate) {
                $q->where('start_date', '>=', $startDate)
                    ->when($endDate, function (Builder $q) use ($endDate) {
                        $q->where('start_date', '<=', $endDate);
                    });
            });
        });

        // Check for same product or category
        if (isset($data['product_id'])) {
            $query->where('product_id', $data['product_id']);
        } elseif (isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }

        // Exclude current discount when updating
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    public function isDiscountActive(Discount $discount): bool
    {
        if (!$discount->is_active) {
            return false;
        }

        $now = Carbon::now();
        return $now->gte($discount->start_date) && 
            (!$discount->end_date || $now->lte($discount->end_date));
    }

    public function calculateDiscountedPrice(float $originalPrice, float $discountValue): float
    {
        $discountAmount = ($originalPrice * $discountValue) / 100;
        return round($originalPrice - $discountAmount, 2);
    }
}