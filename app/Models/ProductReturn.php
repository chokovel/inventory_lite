<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_cart_id',
        'product_color_id',
        'quantity'
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
    public function productColors()
     {
         return $this->hasMany(ProductColor::class);
     }

    public function saleCart(): BelongsTo
    {
        return $this->belongsTo(SaleCart::class, 'sale_cart_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer', 'id');
    }
}
