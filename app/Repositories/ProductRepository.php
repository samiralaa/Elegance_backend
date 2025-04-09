<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function findById(int $id)
    {
        return Product::find($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data)
    {
        $model = Product::findOrFail($id);
        return $model->update($data);
    }

    public function delete(int $id)
    {
        return Product::destroy($id);
    }
}