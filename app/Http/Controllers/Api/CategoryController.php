<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->categoryService->getAllCategories()
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = $this->categoryService->createCategory($data);
        return response()->json($category, 201);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = $this->categoryService->updateCategory($id, $data);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $result = $this->categoryService->deleteCategory($id);

        if (!$result['status']) {
            return response()->json(['message' => $result['message']], 400);
        }
    
        return response()->json(['message' => $result['message']], 200);
    }

    public function posts($id)
    {
        $posts = $this->categoryService->getPostsByCategoryId($id);
        return response()->json($posts);
    }
}
