<?php

namespace App\Services\City;

use App\Models\City;
use App\Traits\ApiResponseTrait;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;

class CityService
{
    use ApiResponseTrait, CrudTrait;

    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        try {
            $cities = $this->model->with('country')->active()->get();
            return $this->successResponse($cities, 'Cities retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            
            $city = $this->model->create($data);
            
            DB::commit();
            return $this->successResponse($city, 'City created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $city = $this->model->findOrFail($id);
            $city->update($data);

            DB::commit();
            return $this->successResponse($city, 'City updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $city = $this->model->findOrFail($id);
            $city->update(['is_deleted' => true]);
            return $this->successResponse(null, 'City deleted successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}