<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct() {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
      return $this->model->all();
    }

    public function show($id)
    {
      return $this->model->findOrFail($id);
    }

    public function store($data)
    {
      return $this->model->create($data);
    }

    public function update($data, $id)
    {
      $model = $this->model->findOrFail($id);
      $model->update($data);
      return $model;
    }

    public function destroy($id)
    {
      $model = $this->model->findOrFail($id);
      return $model->delete();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}