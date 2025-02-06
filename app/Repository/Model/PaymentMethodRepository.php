<?php

namespace App\Repository\Model;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Collection;

class PaymentMethodRepository extends ModelRepository
{
    public function __construct(PaymentMethod $paymentMethod)
    {
        parent::__construct($paymentMethod);
    }

    /**
     * Search only for payment records that are active
     * @return Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getActives(): Collection
    {
        return $this->model->where('active', true)->get();
    }
}