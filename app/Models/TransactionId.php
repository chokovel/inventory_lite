<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionId extends Model
{
    use HasFactory;


    public function saleCarts(): HasMany
    {
        return $this->hasMany(SaleCart::class, 'transaction_id', 'id');
    }
}
