<?php
namespace App\Application\Services;

use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;

class UserService implements UserRepositoryInterface
{
    private $model;

    public function __construct(UserRepositoryInterface $model)
    {
        $this->model = $model;
    }

    public function findUser(int $id) : User
    {
        return $this->model->findUser($id);
    }

    public function createUSer(array $data) : User
    {
        return $this->model->createUSer($data);
    }

    public function updateUser(int $id, array $data) : User
    {
        return $this->model->updateUser($id, $data);
    }

    public function deleteUser(int $id) : bool
    {
        return $this->model->deleteUser($id);
    }
}
