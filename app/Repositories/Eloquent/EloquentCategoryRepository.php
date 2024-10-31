<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function findById(int $id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update($data);
            return $category->fresh();
        }
    
        return null;
    }

    public function hasPosts(int $categoryId): bool
    {
        $category = Category::with('posts')->find($categoryId);

        return $category && $category->posts->isNotEmpty();
    }

    public function delete(int $categoryId):bool
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return false;
        }

        return $category->delete();
    }    

    public function getPostsByCategoryId(int $categoryId)
    {
        $category = Category::find($categoryId);
        return $category ? $category->posts : null;
    }

    public function findByIdWithPosts(int $id): ?Category
    {
        return Category::with('posts')->find($id);
    }
}
