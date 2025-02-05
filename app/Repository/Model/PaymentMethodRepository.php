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

    public function getActives(): Collection
    {
        return $this->model->where('active', true)->get();
    }
}