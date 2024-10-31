<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function createPost(array $data)
    {
        // You can add business logic here
        return $this->postRepository->create($data);
    }

    // Other methods...
}
