<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Load;

use App\Application\Services\UserService;
use App\Domain\User\UserNotFound;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoadUserController
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(int $userId): JsonResponse | Response
    {
        try {
            $user =  $this->userService->findUser($userId);
        } catch (UserNotFound $e) {
            return new JsonResponse([
                'error' => $e->getMessage(),
                'details' => $e->getDetails()
            ], Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse(
            $user,
            Response::HTTP_OK
        );
    }
}
