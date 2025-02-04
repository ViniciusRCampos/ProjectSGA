<?php

namespace App\Models;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasActive;

    protected $fillable = [
        "name",
        "description",
        "color",
        "active",
        "price"
    ];

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_products')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
