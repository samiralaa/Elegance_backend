<?php

namespace App\Services\Cart;

use App\Models\Cart;

class CartService
{
    public function __construct(protected Cart $model) {}

    public function list()
    {
        return $this->model->where('is_deleted', false)->get();
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function show(int $id)
    {
        $cart = $this->model->find($id);
        return $cart;
    }

    public function update(array $data, int $id)
    {
        $cart = $this->model->find($id);
        if ($cart) {
            $cart->update($data);
            return $cart;
        }
        return null;
    }

    public function delete(int $id)
    {
        $cart = $this->model->find($id);
        if ($cart) {
            $cart->delete();
            return true;
        }
        return false;
    }
}
