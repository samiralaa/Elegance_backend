<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\Users\AuthService;
use App\Traits\ApiResponseTrait;
class AuthUserController extends Controller
{
    use ApiResponseTrait;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Login a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->authService->login($credentials);

        if ($token) {
            return $this->successResponse($token, 'Login successful');
        }

        return $this->unauthorizedResponse('Invalid credentials');
    }

    // Register a new user

        public function register(StoreUserRequest $request)
    {
        // The request is validated automatically because we are using the StoreUserRequest

        // Get the validated data
        $data = $request->validated();

        // Call the register method from the AuthService to create the user and generate a token
        $token = $this->authService->register($data);
        // Return the token in the response
        return $this->createdResponse(['token' => $token, 'user' => $data], 'User registered successfully');
    }


    // Logout a user
    public function logout()
    {
        return $this->authService->logout();
    }

    // Refresh the token
    public function refresh()
    {
        $token = $this->authService->refresh();

        return $this->successResponse(['token' => $token], 'Token refreshed successfully');
    }

    // Get the authenticated user
    public function me()
    {
        return $this->successResponse($this->authService->me(), 'User details retrieved');
    }
}
