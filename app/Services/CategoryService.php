<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        $categories = $this->categoryRepository->getAll();
        return CategoryResource::collection($categories);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory(int $id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory(int $id): array
    {
        if ($this->categoryRepository->hasPosts($id)) {
            return [
                'status' => false,
                'message' => 'Cannot delete category because it has associated posts.'
            ];
        }
    
        $deleted = $this->categoryRepository->delete($id);
    
        return [
            'status' => $deleted,
            'message' => $deleted ? 'Category deleted successfully' : 'Category not found'
        ];
    }

    public function getPostsByCategoryId(int $categoryId)
    {
        $category = $this->categoryRepository->findByIdWithPosts($categoryId);

        if (!$category) {
            return [
                'status' => false,
                'message' => 'Category not found',
                'data' => []
            ];
        }
    
        if ($category->posts->isEmpty()) {
            return [
                'status' => true,
                'message' => 'No posts found for this category',
                'data' => []
            ];
        }
    
        return [
            'status' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $category->posts
        ];
    }
}
