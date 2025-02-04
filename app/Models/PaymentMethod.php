<?php

namespace App\Models;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory, HasActive;

    protected $fillable = [
        "name",
        "description",
        "active"
    ];
}
