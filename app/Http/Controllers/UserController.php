<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UsersService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
    }

    public function store(CreateUserRequest $request)
    {
        $this->userService->createUser($request->validated());
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
    }

    
    public function update(CreateUserRequest $request, $id)
    {
        $this->userService->updateUser($id, $request->validated());
    }
    
    public function destroy($id)
    {
        $this->userService->destroyUser($id);
    }
    
}
