<?php


namespace App\Http\Controllers\Api;


use App\Request\User\CreateUserRequest;
use App\Request\User\LoginUserRequest;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{
    public $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserRequest $request)
    {
        if (!empty($request->getErrors())) {
            return response()->json($request->getErrors(), Response::HTTP_FORBIDDEN);
        }

        $user             = $this->userService->createUser($request->request()->all());
        $message['user']  = $user;
        $message['token'] = $user->createToken('MyApp')->plainTextToken;
        return $this->sendResponse($message);
    }

    public function login(LoginUserRequest $request)
    {
        if (!empty($request->getErrors())) {
            return response()->json($request->getErrors(), Response::HTTP_FORBIDDEN);
        }

        if (!auth()->attempt($request->request()->all())) {
            return $this->sendResponse('Unauthorised', 'Failed', Response::HTTP_UNAUTHORIZED);
        }


        $user             = auth()->user();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name']  = $user['name'];
        return $this->sendResponse($success);

    }

}
