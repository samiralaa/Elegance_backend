<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\Users\AuthService;
class AuthUserController extends Controller
{
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
            return response()->json( $token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
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
        return response()->json(['token' => $token,
        'user' => $data // Include the user details in the response as well for better security
    ]);
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

        return response()->json(['token' => $token]);
    }

    // Get the authenticated user
    public function me()
    {
        return response()->json($this->authService->me());
    }
}
