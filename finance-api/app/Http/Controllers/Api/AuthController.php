<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $registerRequest)
    {
        $result = $this->authService->register($registerRequest->validated());

        return response()->json([
            'message' => 'user berhasil ditambahkan',
            'data' => $result
        ]);
    }

    public function login(LoginRequest $loginRequest)
    {
        $result = $this->authService->login($loginRequest->validated());

        return response()->json([
            'message' => 'Login berhasil',
            'data' => $result
        ]);
    }
}
