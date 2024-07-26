<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Create;

use App\Application\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function __invoke(CreateUserRequest $request): Response
    {

        $user = $this->userService->createUSer($request->validated());

        return new JsonResponse($user, Response::HTTP_CREATED);
    }
}
