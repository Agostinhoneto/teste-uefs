<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $this->userService->createUser($request->all());
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
    }

    public function update(Request $request, $id)
    {
        $this->userService->updateUser($id, $request->all());
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
    }

}
