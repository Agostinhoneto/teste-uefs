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

    public function getById($id)
    {
        return $this->usersRepository
            ->getById($id);
    }


    public function getUserById($id)
    {
        return $this->usersRepository->getById($id);
    }

    public function createUser($id, $name, $email, $password)
    {
        DB::beginTransaction();
        try {
            $data = $this->usersRepository->salvar($id, $name, $email, $password);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function updateUser($id, $name, $email, $password)
    {
        DB::beginTransaction();
        try {
            $data = $this->usersRepository->update($id, $name, $email, $password);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function destroyUser($id)
    {
        return $this->usersRepository->destroyUser($id);
    }
}
