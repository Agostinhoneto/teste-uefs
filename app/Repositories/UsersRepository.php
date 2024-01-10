<?php

namespace App\Repositories;
use App\Models\User;

class UsersRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    
    /*
    public function salvar($id,$name)
    {

        try {
            $user = new User();
            $user->id = $id;
            $user->name = $name;
            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
    */
}
