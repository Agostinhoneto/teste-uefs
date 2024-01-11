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

    public function getById($id){
        return User::findOrFail($id);
    }

    
    public function salvar($id, $name, $email,$password)
    {
        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password  = $password;
            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $name, $email,$password)
    {
        try {
            $user = $this->user->find($id);   
            $user->name = $name;
            $user->email = $email;
            $user->password  = $password;
            $user->update();
            return $user->fresh();
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function destroyUser($id)
    {
        $user = $this->getById($id);
        $user->delete();
    }
}
