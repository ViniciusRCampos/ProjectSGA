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
    /**
     * Search for all records
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
    /**
     * Search for the record with the given id
     * @param mixed $id
     * @return Model
     */
    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }
    /**
     * Creates a new record with the received data
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    /**
     * Updates the record with the informed id, changing the old data with the new data received
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }
    /**
     * Deletes the record with the given id
     * @param int $id
     * @return int
     */
    public function delete(int $id): int 
    {
        return $this->model->destroy($id);
    }
}
