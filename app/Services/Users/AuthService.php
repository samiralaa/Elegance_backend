<?php
namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class AuthService
{
    /**
     * Register a new user
     *
     * @param array $data
     * @return User
     */
    public function register(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    /**
     * Authenticate a user
     *
     * @param array $credentials
     * @return array
     * @throws ValidationException
     */
    public function login(array $credentials): array
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth-token', ['*'], Carbon::now()->addDays(7));

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    /**
     * Logout the authenticated user
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }

    /**
     * Get the authenticated user
     *
     * @return User|null
     */
    public function getAuthenticatedUser(): ?User
    {
        return Auth::user();
    }

    /**
     * Refresh the user's token
     *
     * @return array
     */
    public function refreshToken(): array
    {
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('auth-token', ['*'], Carbon::now()->addDays(7));

        return [
            'user' => $user,
            'token' => [
                'access_token' => $token->plainTextToken,
                'token_type' => 'Bearer',
                'expires_at' => $token->accessToken->expires_at,
            ]
        ];
    }
}
