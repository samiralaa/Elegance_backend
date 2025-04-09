<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use App\Traits\ApiResponseTrait;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return $this->successResponse($categories);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $category = $this->categoryService->getCategoryById($id);
            return $this->successResponse($category);
        } catch (\Exception $e) {
            return $this->notFoundResponse('Category not found');
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $category = $this->categoryService->createCategory($data);

            if ($request->hasFile('image')) {
                $category->addMediaFromRequest('image')
                    ->toMediaCollection('category_image');
            }

            return $this->createdResponse($category);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(CategoryRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $category = $this->categoryService->updateCategory($id, $data);

            if ($request->hasFile('image')) {
                $category->clearMediaCollection('category_image');
                $category->addMediaFromRequest('image')
                    ->toMediaCollection('category_image');
            }

            return $this->successResponse($category, 'Category updated successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            return $this->deletedResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
