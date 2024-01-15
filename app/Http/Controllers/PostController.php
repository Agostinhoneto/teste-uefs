<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Services\PostsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }


    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->postService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function store(Request $request)
    {
        $result['data'] = $this->postService->createPost(
            $request->user_id,
            $request->title,
            $request->content,
            $request->tags,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function update(Request $request,$id)
    {      
        DB::beginTransaction();
        try {
            $result['data'] =  $this->postService->updatePost(
                $request->id,
                $request->user_id,
                $request->title,
                $request->content,
                $request->tags,          
            );
            DB::commit();
            return response()->json([Messages::UPDATE_MESSAGE, HttpStatusCodes::OK,$result]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR,$e]);
        }
    }

    public function destroy($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->postService->destroy($id);
            return response()->json([Messages::DELETE_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}
