<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\DB;

class UsersService
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getAllUsers()
    {
        return $this->usersRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->usersRepository->getUserById($id);
    }

    public function createUser(array $data)
    {
        return $this->usersRepository->createUser($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->usersRepository->updateUser($id, $data);
    }

    public function destroyUser($id)
    {
        return $this->usersRepository->destroyUser($id);
    }
}
