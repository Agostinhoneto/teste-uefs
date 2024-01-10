<?php

namespace App\Repositories;

use App\Models\Tag;

class tagsRepository
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function getTagById($id)
    {
        return Tag::findOrFail($id);
    }

    public function createTag(array $data)
    {
        return Tag::create($data);
    }

    public function updateTag($id, array $data)
    {
        $user = $this->getTagById($id);
        $user->update($data);
        return $user;
    }

    public function destroyTag($id)
    {
        $user = $this->getTagById($id);
        $user->delete();
    }
}
