<?php

namespace App\Domain\User;


interface UserRepositoryInterface
{
    public function findUser(int $id): ? User;

    public function createUSer(array $data): User;

    public function updateUser(int $id, array $data): ? User;

    public function deleteUser(int $id): bool;
}
