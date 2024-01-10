<?php

namespace App\Services;

use App\Repositories\tagsRepository;

class TagsService
{
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getAllUsers()
    {
        return $this->tagsRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->tagsRepository->getUserById($id);
    }

    public function createUser(array $data)
    {
        return $this->tagsRepository->createUser($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->tagsRepository->updateUser($id, $data);
    }

    public function destroyUser($id)
    {
        return $this->tagsRepository->destroyUser($id);
    }
}
