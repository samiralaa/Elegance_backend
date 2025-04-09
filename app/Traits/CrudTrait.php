<?php

namespace App\Traits;

trait CrudTrait
{
    public function getAllByRelation($relation,$model,$select=[])
    {
        return $model->with($relation)->select($select)->get();
    }

    public function getAllByRelationWithPagination($relation,$model,$select=[],$perPage=10)
    {
        return $model->with($relation)->select($select)->paginate($perPage);
    }

    public function getByIdWithRelation($model,$id,$select=[],$relation=[])
    {
        return $model->select($select)->with($relation)->find($id);
    }

    public function getById($model,$id,$select=[])
    {
        return $model->select($select)->find($id);
    }

    public function create($model,$data)
    {
        return $model->create($data);
    }

    public function update($model,$id,$data)
    {
        return $model->find($id)->update($data);
    }

    public function delete($model,$id)
    {
        return $model->find($id)->delete();
    }

}
