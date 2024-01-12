<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostsService;
use Exception;
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
        $limit = 10;
        try {
            $result['data'] = $this->postService->getAll($limit);
            return response()->json([Messages::SUCCESS_MESSAGE,HttpStatusCodes::OK,$result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
   

    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->postService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK,$result]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
   
    public function store(StorePostRequest $request)
    {   
     
        $result['data'] = $this->postService->createPost(
            $request->id,
            $request->user_id,
            $request->title,
            $request->content,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);

    }

    public function update(Request $request, $id)
    {
        $result['data'] = $this->postService->updatePost(
            $request->id,
            $request->user_id,
            $request->title,
            $request->content,
        );
        return response()->json([Messages::UPDATE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function destroy($id){
        $result = ['status' => 200];
        try{
            $result['data'] = $this->postService->destroy($id);
            return response()->json([Messages::DELETE_MESSAGE, HttpStatusCodes::OK, $result]);
        }catch(Exception $e){
           return response()->json([
                	'success' => false,
                	'message' => 'não foi possivél deletar',
                ], 500);
        }
    }   
}
