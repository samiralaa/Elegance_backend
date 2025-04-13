<?php

namespace App\Repositories\Eloquent;

use App\Models\Unit;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class UnitRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = $this->findById($id);
        $user->delete();
        return true;
    }
}
