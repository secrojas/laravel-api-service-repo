<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return response()->json($this->postService->getAllPosts());
    }

    public function store(StorePostRequest $request)
    {
        try {
            $data = $request->validated();
            $post = $this->postService->createPost($data);
            return response()->json($post, 201);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }
}
