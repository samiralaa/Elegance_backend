<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;

use App\Services\Client\ClientAuthService;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\Client\StoreRequestClient;
class ClientAuthController extends Controller
{
    protected $clientAuthService;

    public function __construct(ClientAuthService $clientAuthService)
    {
        $this->clientAuthService = $clientAuthService;
    }

    public function register(StoreRequestClient $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $user = $this->clientAuthService->register($validated);

            return response()->json([
                'message' => 'Client registered successfully with cart.',
                'user'    => $user->makeHidden(['password']),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Registration failed.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
