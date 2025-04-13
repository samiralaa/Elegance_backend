<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait CrudTrait
{
    protected $crudModel;

    public function getAll()
    {
        try {
            return $this->crudModel->all();
        } catch (\Exception $e) {
            Log::error('Error getting records: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            return $this->crudModel->findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error getting record by id: ' . $e->getMessage());
            throw $e;
        }
    }

    public function create(array $data)
    {
        try {
            return $this->crudModel->create($data);
        } catch (\Exception $e) {
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $record = $this->crudModel->findOrFail($id);
            $record->update($data);
            return $record;
        } catch (\Exception $e) {
            Log::error('Error updating record: ' . $e->getMessage());
            throw $e;
        }
    }

    public function delete(int $id)
    {
        try {
            $record = $this->crudModel->findOrFail($id);
            $record->delete();
            return true;
        } catch (\Exception $e) {
            Log::error('Error deleting record: ' . $e->getMessage());
            throw $e;
        }
    }

}
