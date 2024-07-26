<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Database\Models\User as userModel;
use App\Domain\User\User;
use App\Domain\User\UserNotFound;
use App\Domain\User\UserRepositoryInterface;
use App\Presenter\Exceptions\GeneralException;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    protected $db;

    public function __construct(userModel $model, DatabaseManager $db)
    {
        $this->model = $model;
        $this->db = $db;
    }

    public function createUSer(array $data) : User
    {
        try {
            $this->db->beginTransaction();

            $user = $this->model->create($data);

            $this->db->commit();

            return User::fromArray($user->toArray());
        } catch (QueryException $e) {
            $this->db->rollBack();

            Log::error('User creation failed: ' . $e->getMessage());

            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }
    }

    public function updateUser(int $id, array $data) : User
    {
        try {
            $this->db->beginTransaction();

            $this->model->where('id', $id)->update($data);

            $this->db->commit();

            $updatedUser = $this->model->find($id);

            return $updatedUser ? User::fromArray($updatedUser->toArray()) : null;
        } catch (QueryException $e) {
            $this->db->rollBack();

            Log::error('User update failed: ' . $e->getMessage());

            throw new GeneralException(__('There was a problem updating this user. Please try again.'));
        }
    }

    public function deleteUser(int $id) : bool
    {
        return $this->model->destroy($id);
    }

    public function findUser(int $id) : User
    {
        try {
            $user = $this->model->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new UserNotFound($id);
        }

        return User::fromArray($user->toArray());
    }
}
