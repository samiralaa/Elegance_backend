<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Services\Unit\UnitService;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\Unit\StoreUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;
use Illuminate\Http\JsonResponse;

class UnitController extends Controller
{
    use ApiResponseTrait;

    protected $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    /**
     * Display a listing of the units.
     */
    public function index(): JsonResponse
    {
        try {
            $units = $this->unitService->index();
            return $this->successResponse($units, 'Units retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Store a newly created unit in storage.
     */
    public function store(StoreUnitRequest $request): JsonResponse
    {
        try {
            $unit = $this->unitService->createUnit($request->validated());
            return $this->createdResponse($unit, 'Unit created successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Display the specified unit.
     */
    public function show($id): JsonResponse
    {
        try {
            $unit = $this->unitService->getUnitById($id);
            return $this->successResponse($unit, 'Unit retrieved successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse('Unit not found');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Update the specified unit in storage.
     */
    public function update(UpdateUnitRequest $request, $id): JsonResponse
    {
        try {
            $unit = $this->unitService->updateUnit($id, $request->validated());
            return $this->successResponse($unit, 'Unit updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse('Unit not found');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified unit from storage.
     */
    public function destroy($id): JsonResponse
    {
        try {
            $this->unitService->deleteUnit($id);
            return $this->successResponse(null, 'Unit deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse('Unit not found');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
