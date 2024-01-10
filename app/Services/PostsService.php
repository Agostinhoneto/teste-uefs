<?php

namespace App\Services;

use App\Repositories\PostsRepository;

class PostsService
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getAllUsers()
    {
        return $this->postsRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->postsRepository->getUserById($id);
    }

    public function createUser(array $data)
    {
        return $this->postsRepository->createUser($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->postsRepository->updateUser($id, $data);
    }

    public function destroyUser($id)
    {
        return $this->postsRepository->destroyUser($id);
    }
}
