<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::all();
    }

    public function findById(int $id)
    {
        return Post::find($id);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(int $id, array $data)
    {
        $post = Post::find($id);
        return $post ? $post->update($data) : null;
    }

    public function delete(int $id)
    {
        return Post::destroy($id);
    }
}
