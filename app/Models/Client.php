<?php

namespace App\Models;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory, HasActive;

    protected $fillable = [
        "name",
        "CPF",
        "email",
        "gender_id",
        "active"
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
}
