<?php

namespace App\Services\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;

class BrandService
{
    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function getAllBrands()
    {
        try {
            return $this->model->with('images')->get();
        } catch (\Exception $e) {
            Log::error('Error getting brands: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getBrandById(int $id)
    {
        try {
            return $this->model->with('images')->findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error getting brand by id: ' . $e->getMessage());
            throw $e;
        }
    }

    public function createBrand(array $data)
    {
        try {
            $brand = $this->model->create($data);
            
            if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
                $brand->addImage($data['logo'], 'logo');
            }
            
            return $brand->load('images');
        } catch (\Exception $e) {
            Log::error('Error creating brand: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateBrand(int $id, array $data)
    {
        try {
            $brand = $this->model->findOrFail($id);
            $brand->update($data);
            
            if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
                $brand->deleteImage('logo');
                $brand->addImage($data['logo'], 'logo');
            }
            
            return $brand->load('images');
        } catch (\Exception $e) {
            Log::error('Error updating brand: ' . $e->getMessage());
            throw $e;
        }
    }

    public function deleteBrand(int $id)
    {
        try {
            $brand = $this->model->findOrFail($id);
            $brand->delete();
            return true;
        } catch (\Exception $e) {
            Log::error('Error deleting brand: ' . $e->getMessage());
            throw $e;
        }
    }
} 