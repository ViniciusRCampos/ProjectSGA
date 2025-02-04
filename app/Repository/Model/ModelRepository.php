<?php

namespace App\Repository\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class ModelRepository {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all(): Collection
    {
        return $this->model->all();
    }
    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    public function update($id, array $data): Model
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }
    public function delete($id): int 
    {
        return $this->model->destroy($id);
    }
}
