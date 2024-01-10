<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
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
        $post = Post::paginate();
        return PostsService::collection($post);
    }

    public function store(Request $request)
    {
        /*
        $result['data'] =  $this->postService->salvar(
           // $request->id,
           // $request->surfista1,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
        */
    }
}
