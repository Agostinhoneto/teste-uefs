<?php

namespace App\Http\Controllers;

use App\Services\TagsService;
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
        $users = $this->tagService->getAllTags();
    }

    public function show($id)
    {
        $user = $this->tagService->getTagById($id);
    }

    public function store(Request $request)
    {
        $this->tagService->createTag($request->validated());
    }

    public function edit($id)
    {
        $user = $this->tagService->getTagById($id);
    }

    
    public function update(Request $request, $id)
    {
        $this->tagService->updateTag($id, $request->validated());
    }
    
    public function destroy($id)
    {
        $this->tagService->destroyTag($id);
    }
}
