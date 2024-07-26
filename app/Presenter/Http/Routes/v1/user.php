<?php

declare(strict_types=1);

use App\Presenter\Http\User\Create\CreateUserController;
use App\Presenter\Http\User\Delete\DeleteUserController;
use App\Presenter\Http\User\Update\UpdateUserController;
use App\Presenter\Http\User\Load\LoadUserController;
use App\Presenter\Http\User\Login\LoginUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('/user')->group(function () {
    Route::post('', CreateUserController::class);
    Route::get('/{userId}', LoadUserController::class);
    Route::post('{userId}/update', UpdateUserController::class);
    Route::delete('{userId}/delete', DeleteUserController::class);
});

Route::post('/auth/login', LoginUserController::class);
