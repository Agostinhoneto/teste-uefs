<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Psr\Log\InvalidArgumentException;

class UsersService
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getAll()
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

    public function destroyUser($id){
        DB::beginTransaction();
        try{
            DB::commit();
            $user = $this->usersRepository->delete($id);
        }
        catch(Exception $e){
            DB::roolBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Não pode ser deletado');
        }
        return $user;
    }
}
