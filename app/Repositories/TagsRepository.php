<?php

namespace App\Repositories;

use App\Models\Tag;

class tagsRepository
{
    public function getAllUsers()
    {
        return Tag::all();
    }

    public function getUserById($id)
    {
        return Tag::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return Tag::create($data);
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
