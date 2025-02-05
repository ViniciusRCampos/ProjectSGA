<?php

namespace App\Repository\Model;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Collection;

class GenderRepository extends ModelRepository{

    public function __construct(Gender $gender)
    {
        parent::__construct($gender);
    }

    public function getActives(): Collection
    {
        return $this->model->where('active', true)->get();
    }
}