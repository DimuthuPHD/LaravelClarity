<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Delete;

use App\Application\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class DeleteUserController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(int $userId): Response
    {
        $deleted = $this->userService->deleteUser($userId);

        if ($deleted) {
            return new Response(null, Response::HTTP_OK);
        } else {
            return new Response(null, Response::HTTP_NOT_FOUND);
        }
    }
}
