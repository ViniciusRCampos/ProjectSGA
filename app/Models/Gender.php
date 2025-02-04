<?php

namespace App\Models;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    use HasFactory, HasActive;

    protected $fillable = [
        "name",
        "description",
        "active"
    ];

    public function clients (): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
