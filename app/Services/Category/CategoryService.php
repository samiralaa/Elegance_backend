<?php

namespace App\Services;

use App\Repositories\Eloquent\CategoryRepository;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    /**
     * Find category by ID.
     */
    public function getCategoryById(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    /**
     * Create a new category.
     */
    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    /**
     * Update a category.
     */
    public function updateCategory(int $id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    /**
     * Delete a category.
     */
    public function deleteCategory(int $id)
    {
        return $this->categoryRepository->delete($id);
    }
}
