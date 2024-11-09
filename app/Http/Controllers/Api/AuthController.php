<?php


namespace App\Http\Controllers\Api;


use App\Request\User\CreateUserRequest;
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

    public function login()
    {

    }

}
