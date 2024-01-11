<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use App\Services\PostsService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    private $postService;

    public function __construct(PostsService $postService)
    {
        $this->postService = $postService;
    }

    
    public function index()
    {
        $user = Post::paginate();
        return PostsResource::collection($user);
    }

    public function show($id)
    {
        $user = $this->postService->getPostById($id);
    }

    public function store(CreatePostRequest $request)
    {
        $this->postService->createPost($request->validated());
    }

    public function edit($id)
    {
        $user = $this->postService->getPostById($id);
    }

    
    public function update(CreatePostRequest $request, $id)
    {
        $this->postService->updatePost($id, $request->validated());
    }
    
    public function destroy($id)
    {
        $this->postService->destroyPost($id);
    }
}
