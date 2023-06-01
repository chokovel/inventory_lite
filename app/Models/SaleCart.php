<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Expr\FuncCall;

class SaleCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_color_id',
        'customer_id',
        'quantity',
        'transaction_id'
    ];

    public static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function productReturn(): HasOne
    {
        return $this->hasOne(ProductReturn::class, 'sale_cart_id', 'id');
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(TransactionId::class, 'transaction_id', 'id');
    }

    public function transaction_ids()
    {
        return $this->belongsTo(TransactionId::class, 'transaction_id');
    }
}
