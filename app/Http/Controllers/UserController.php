<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Services\UsersService;
use Exception;
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
        $user = User::paginate();
        return UsersResource::collection($user);
    }
    
    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->userService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
   
    public function store(Request $request)
    {
        $result['data'] = $this->userService->createUser(
            $request->id,
            $request->name,
            $request->email,
            $request->password,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function update(Request $request, $id)
    {
        $result['data'] = $this->userService->updateUser(
            $request->id,
            $request->name,
            $request->email,
            $request->password,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }



    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
    }


    
    public function destroy($id)
    {
        $this->userService->destroyUser($id);
    }
}
