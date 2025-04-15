<?php

namespace App\Services\Unit;

use App\Models\Unit;
use App\Traits\CrudTrait;
class UnitService
{
    use  CrudTrait;
    protected $model;
    public function __construct(Unit $model)
    {
        $this->setModel($model);
    }

    /**
     * Get all units.
     */
    public function index()
    {
        $units= $this->model->all();
        return $units;
    }

    /**
     * Find unit by ID.
     */
    public function getUnitById(int $id)
    {
        $unit = $this->getById($id);
        return $unit;
    }
    /**
     * Create a new unit.
     */
    public function createUnit(array $data)
    {
        $unit= $this->create($data);
        return $unit;

    }

    /**
     * Update a unit.
     */
    public function updateUnit(int $id, array $data)
    {

        $unit = $this->update($id, $data);
        return $unit;
    }

    /**
     * Delete a unit.
     */
    public function deleteUnit(int $id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }
}
