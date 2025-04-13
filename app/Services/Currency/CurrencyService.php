<?php

namespace App\Services\Currency;

use App\Models\Currency;
use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CurrencyService
{
    use CrudTrait;

    public function __construct(protected Currency $model)
    {
    }

    public function list(): Collection
    {
        return $this->model->where('is_deleted', false)->get();
    }

    public function store(array $data): Model
    {
        return $this->model->create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'exchange_rate' => $data['exchange_rate'],
            'is_deleted' => false
        ]);
    }

    public function update(array $data, int $id): Model
    {
        $currency = $this->model->findOrFail($id);
        $currency->update([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'exchange_rate' => $data['exchange_rate']
        ]);
        return $currency;
    }

    public function delete(int $id): bool
    {
        $currency = $this->model->findOrFail($id);
        $currency->update(['is_deleted' => true]);
        return true;
    }

    public function show(int $id): Model
    {
        return $this->model->where('is_deleted', false)->findOrFail($id);
    }
}