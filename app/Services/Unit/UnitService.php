<?php

namespace App\Services\Unit;

use App\Models\Unit;
use App\Traits\CrudTrait;
class UnitService
{
    use  CrudTrait;

    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

    /**
     * Get all units.
     */
    public function getAllUnits()
    {
        return $this->getAll();
    }

    /**
     * Find unit by ID.
     */
    public function getUnitById(int $id)
    {
        return $this->getById($id);
    }

    /**
     * Create a new unit.
     */
    public function createUnit(array $data)
    {
        return $this->create($data);
    }

    /**
     * Update a unit.
     */
    public function updateUnit(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Delete a unit.
     */
    public function deleteUnit(int $id)
    {
        return $this->delete($id);
    }
}
