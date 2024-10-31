<?php

namespace App\Repositories\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function hasPosts(int $categoryId): bool;
    public function delete(int $id);
    public function getPostsByCategoryId(int $categoryId);
    public function findByIdWithPosts(int $categoryId): ?Category;

}
