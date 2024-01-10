<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function updatePost($id, array $data)
    {
        $user = $this->getPostById($id);
        $user->update($data);
        return $user;
    }

    public function destroyPost($id)
    {
        $user = $this->getPostById($id);
        $user->delete();
    }
}
