<?php


namespace App\Services\Address;

use App\Models\Address;


class AddressService
{

    public function __construct(protected Address $model) {}
    public function list()
    {
        return $this->model->where('is_deleted', false)->get();
    }

    public function index() {
        $address = $this->model->all();
        return $address;

    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function show(int $id)
    {
        $address = $this->model->find($id);


        return $this->$address;


    }


    public function update(array $data, int $id)
    {
        $address = $this->model->find($id);
        if ($address) {
            $address->update($data);
            return $address;
        }
        return null;
    }

    public function delete(int $id)
    {
        $address = $this->model->find($id);
        if ($address) {
            $address->delete();
            return true;
        }
        return false;
    }
}
