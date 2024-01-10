<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{
    public function getAllUsers()
    {
        return Post::all();
    }

    public function getUserById($id)
    {
        return Post::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return Post::create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->getUserById($id);
        $user->update($data);
        return $user;
    }

    public function destroyUser($id)
    {
        $user = $this->getUserById($id);
        $user->delete();
    }
}
