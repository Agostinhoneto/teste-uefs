<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Resources\TagsResource;
use App\Models\Tag;
use App\Services\TagsService;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagsService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $user = Tag::paginate();
        return TagsResource::collection($user);
    }

    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->tagService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function store(Request $request)
    {
        $result['data'] = $this->tagService->createTag(
            $request->id,
            $request->user_id,
            $request->title,
            $request->content,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function update(Request $request, $id)
    {
        $result['data'] = $this->tagService->updateTag(
            $request->id,
            $request->user_id,
            $request->title,
            $request->content,
        );
        return response()->json([Messages::UPDATE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function destroy($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->tagService->destroy($id);
            return response()->json([Messages::DELETE_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'não foi possivél deletar',
            ], 500);
        }
    }
}
