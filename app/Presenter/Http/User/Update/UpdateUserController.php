<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Update;

use App\Application\Services\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserController
{
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function __invoke(UpdateUserRequest $request, int $userId): Response
    {
        $user = $this->userService->updateUser($userId, $request->validated());
        return new JsonResponse($user, Response::HTTP_OK);
    }
}
