<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginUserController
{
    public function __invoke(LoginUserRequest $request): JsonResponse | Response
    {
        try {

            if (!Auth::attempt(...[$request->validated()])) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], Response::HTTP_UNAUTHORIZED);
            }

            $token = $request->user()->createToken('login')->plainTextToken;

            return new JsonResponse([
                'token' => $token
            ], Response::HTTP_OK);

        } catch (UnauthorizedException $e) {
            return new Response('Fail to login', Response::HTTP_FORBIDDEN);
        }
    }
}
