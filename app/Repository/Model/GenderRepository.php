<?php

namespace App\Repository\Model;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Collection;

class GenderRepository extends ModelRepository{

    public function __construct(Gender $gender)
    {
        parent::__construct($gender);
    }

    /**
     * Search only for gender records that are active
     * @return Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getActives(): Collection
    {
        return $this->model->where('active', true)->get();
    }
}