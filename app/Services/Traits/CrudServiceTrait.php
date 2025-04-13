<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Log;

trait CrudServiceTrait
{
    protected $model;

    public function getAll()
    {
        try {
            return $this->model->all();
        } catch (\Exception $e) {
            Log::error('Error getting records: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getById(int $id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error getting record by id: ' . $e->getMessage());
            throw $e;
        }
    }

    public function create(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $record = $this->model->findOrFail($id);
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
            $record = $this->model->findOrFail($id);
            $record->delete();
            return true;
        } catch (\Exception $e) {
            Log::error('Error deleting record: ' . $e->getMessage());
            throw $e;
        }
    }
} 