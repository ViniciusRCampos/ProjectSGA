<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "store_id",
        "seller_id",
        "payment_id",
        "total",
        "observation"
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_products')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
