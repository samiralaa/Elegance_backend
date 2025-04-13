<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Traits\ApiResponseTrait;
use App\Traits\CrudTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    use ApiResponseTrait, CrudTrait;

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAllWithRelations()
    {
        return $this->model->with(['brand','images'])->get();
    }
   public function getById($id)
    {
        return $this->model->with(['brand','images'])->first();
    }
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $category = $this->model->create($data);

            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $category->addImage($data['image'], 'category');
            }

            DB::commit();
            return $this->successResponse($category, 'Category created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $category = $this->model->findOrFail($id);
            $category->update($data);

            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $category->clearMediaCollection('category');
                $category->addImage($data['image'], 'category');
            }

            DB::commit();
            return $this->successResponse($category, 'Category updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $category = $this->model->findOrFail($id);
            
            // Check if category has products
            if ($category->products()->exists()) {
                return $this->errorResponse('Cannot delete category with associated products');
            }

            $category->delete();
            
            DB::commit();
            return $this->successResponse(null, 'Category deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
