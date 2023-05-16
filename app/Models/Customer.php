<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'dob', 'address', 'note'];

    public function saleCarts(): HasMany
    {
        return $this->hasMany(SaleCart::class, 'customer_id', 'id');
    }
}
