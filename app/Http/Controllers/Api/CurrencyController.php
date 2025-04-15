<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Currency\CurrencyService;
use App\Traits\ApiResponse;
use App\Traits\ValidationResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    use ApiResponse, ValidationResponse;

    protected function validationErrorResponse($errors)
    {
        return $this->validationErrorResponse($errors, 'Validation failed');
    }

    public function __construct(protected CurrencyService $service)
    {
    }

    public function index(): JsonResponse
    {
        $currencies = $this->service->list();
        return $this->successResponse($currencies);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'exchange_rate' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $currency = $this->service->store($request->all());
        return $this->successResponse($currency, 'Currency created successfully');
    }

    public function show(int $id): JsonResponse
    {
        $currency = $this->service->show($id);
        return $this->successResponse($currency);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'exchange_rate' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $currency = $this->service->update($request->all(), $id);
        return $this->successResponse($currency, 'Currency updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return $this->successResponse(null, 'Currency deleted successfully');
    }
}