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
    
    /*
    public function createUser($name)
    {
        DB::beginTransaction();
        try {
            $data = $this->usersRepository->salvar($name);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
    */
    }
