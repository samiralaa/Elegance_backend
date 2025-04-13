<?php

namespace App\Services\Country;

use App\Models\Country;
use App\Traits\ApiResponseTrait;
use App\Traits\CrudTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class CountryService
{
    use ApiResponseTrait, CrudTrait;

    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        try {
            $countries = $this->model->all();
            return $this->successResponse($countries, 'Countries retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            
            $country = $this->model->create($data);
            
            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $country->addImage($data['image'], 'countries');
            }

            DB::commit();
            return $this->successResponse($country, 'Country created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $country = $this->model->findOrFail($id);

            if (isset($data['image'])) {
                $data['image_path'] = $this->uploadImage($data['image'], 'countries', $country->image_path);
            }

            $country->update($data);

            DB::commit();
            return $this->successResponse($country, 'Country updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    protected function uploadImage(UploadedFile $image, string $path, ?string $oldPath = null): string
    {
        if ($oldPath) {
            $this->deleteImage($oldPath);
        }

        return $image->store($path, 'public');
    }

    protected function deleteImage(?string $path): void
    {
        if ($path) {
            \Storage::disk('public')->delete($path);
        }
    }

    public function destroy($id)
    {
        try {
            $country = $this->model->findOrFail($id);
            $country->update(['is_deleted' => true]);
            return $this->successResponse(null, 'Country deleted successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}